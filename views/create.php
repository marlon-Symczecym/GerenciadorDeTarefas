<?php
require 'templates/header.php';
require_once 'templates/user.php';
?>

<div class="layout--image task--image"></div>

<div class="task--box">

    <a href="index.php" class="back"><i class="fas fa-arrow-left"></i></a>
    <h1 class="letter-green-color title">Nova Tarefa</h1>

    <form class="task--form-create" action="task_register_action.php" method="post" autocomplete="off">
        <div class="task--form-name">
            <label class="letter-green-color form--label" for="task">Tarefa</label>
            <br>
            <input class="form--input-text" type="text" name="task" id="task" placeholder="Digite uma nova tarefa...">
        </div>

        <button class="task--create" type="submit"><i class="fas fa-save"></i></button>
    </form>

</div>

<?php require 'templates/footer.php';?>