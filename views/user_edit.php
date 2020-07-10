<?php
require 'templates/header.php';

require_once '../config.php';
require_once 'templates/user.php';
require_once '../models/Usuario.php';
require_once '../dao/UsuarioDao.php';

use dao\UsuarioDao;
use models\Usuario;

$userDao = new UsuarioDao($pdo);
$user = $userDao->findId($_SESSION['user_id']);

?>

<div class="layout--image task--image"></div>

<div class="task--box">

    <a href="index.php" class="back"><i class="fas fa-arrow-left"></i></a>
    <h1 class="letter-green-color title">Editando Usuário</h1>

    <form class="edit--user-form" action="user_edit_action.php" method="post" autocomplete="off">
        <div class="task--form-name">
            <label class="letter-green-color form--label" for="task">Nome</label>
            <br>
            <input class="form--input-text" type="text" name="name" id="task" value="<?=$user->getName()?>">
        </div>

        <div class="register--form-password">
            <label class="letter-green-color form--label" for="password">Senha</label>
            <br>
            <input class="form--input-password" type="password" name="password" id="password" placeholder="Digite a sua senha...">
        </div>

        <div class="register--form-password">
            <label class="letter-green-color form--label" for="password_confirm">Confirmar</label>
            <br>
            <input class="form--input-password" type="password" name="password_confirmation" id="password_confirm" placeholder="Confirme sua senha...">
        </div>

        <button class="user--edit" type="submit"><i class="fas fa-save"></i></button>
    </form>

</div>

<?php require 'templates/footer.php';?>