<?php session_start(); ?>
<div class="task--user">
    <i class="fas fa-arrow-down letter-blue-color user--arrow" id="user--arrow"></i>
    <?=$_SESSION['name']?>
    <div class="menu--wrapper">
        <div class="menu--user">
            <a href="user_edit.php">editar</a>
            <a href="logout.php">sair</a>
        </div>
    </div>
</div>