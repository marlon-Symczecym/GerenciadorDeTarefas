<?php
require 'templates/header.php';
require_once 'templates/user.php';
require_once '../models/Task.php';
require_once '../dao/TaskDao.php';

use dao\TaskDao;
use models\Task;

$taskId = filter_input(INPUT_GET, 'id');

$taskDao = new TaskDao($pdo);
$task = $taskDao->findId($taskId);

?>

    <div class="layout--image task--image"></div>

    <div class="task--box">

        <a href="index.php" class="back"><i class="fas fa-arrow-left"></i></a>
        <h1 class="letter-green-color title">Editar Tarefa</h1>

        <form class="task--form-create" action="task_edit_action.php" method="post" autocomplete="off">
            <div class="task--form-name">
                <label class="letter-green-color form--label" for="task">Tarefa</label>
                <br>
                <input type="hidden" name="id" value="<?=$task->getId()?>">
                <input class="form--input-text" type="text" name="task" id="task" value="<?=$task->getTask()?> ">
            </div>

            <button class="task--create" type="submit"><i class="fas fa-save"></i></button>
        </form>

    </div>

<?php require 'templates/footer.php';?>