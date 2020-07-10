<?php
require_once '../config.php';
require_once '../models/Task.php';
require_once '../dao/TaskDao.php';

use dao\TaskDao;
use models\Task;

$taskId = filter_input(INPUT_POST, 'id');
$taskText = filter_input(INPUT_POST, 'task');

$task = new Task();
$task->setId($taskId);
$task->setTask($taskText);

$taskDao = new TaskDao($pdo);
$taskDao->update($task);