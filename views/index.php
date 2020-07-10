<?php
require 'templates/header.php';

require_once '../config.php';
require_once 'templates/user.php';
require_once '../models/Task.php';
require_once '../dao/TaskDao.php';

use dao\TaskDao;


$task = new TaskDao($pdo);
$tasks = $task->read();

?>

<div class="layout--image task--image"></div>

<div class="task--box">

    <h1 class="letter-green-color title">Lista de Tarefas</h1>

    <table>
        <thead>
            <tr>
                <th>check</th>
                <th>Tarefa</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <?php if($task->getCheck() == 0): ?>
                    <td><a class="task--circle" href="mark.php?id=<?=$task->getId()?>&check=<?=$task->getCheck()?>"></a></td>
                <?php elseif ($task->getCheck() == 1): ?>
                    <td><a class="task--circle-checked" href="mark.php?id=<?=$task->getId()?>&check=<?=$task->getCheck()?>"></a></td>
                <?php endif; ?>
                <td><?=$task->getTask()?></td>
                <td>
                    <a class="letter-blue-color" href="edit.php?id=<?=$task->getId()?>"><i class="fas fa-edit"></i></a>
                    <a class="letter-red-color" onclick="return confirm('Tem certeza que deseja deletar essa tarefa ?')" href="delete.php?id=<?=$task->getId()?>"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>

<button class="task--create">
    <a href="create.php">
        <i class="fas fa-plus"></i>
    </a>
</button>

<?php require 'templates/footer.php';?>