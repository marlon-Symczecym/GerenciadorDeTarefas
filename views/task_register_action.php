<?php
session_start();
require_once '../config.php';
require_once '../models/Task.php';
require_once '../dao/TaskDao.php';

use dao\TaskDao;
use models\Task;

$task_input = filter_input(INPUT_POST, 'task');

$task = new Task();
$task->setUserId($_SESSION['user_id']);
$task->setTask($task_input);

$taskDao = new TaskDao($pdo);
$taskDao->create($task);