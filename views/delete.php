<?php

require_once '../config.php';
require_once '../models/Task.php';
require_once '../dao/TaskDao.php';

use dao\TaskDao;

$id = filter_input(INPUT_GET, 'id');

$task = new TaskDao($pdo);
$task->delete($id);