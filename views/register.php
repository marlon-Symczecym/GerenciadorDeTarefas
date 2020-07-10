<?php
require 'templates/header.php';
?>

<div class="layout--image register--image"></div>

<div class="form register--form">
    <h1 class="letter-green-color title">cadastro</h1>
    <form action="register_action.php" method="post" autocomplete="off">
        <div class="register--form-name">
            <label class="letter-green-color form--label" for="name">Nome</label>
            <br>
            <input class="form--input-text" type="text" name="name" id="name" placeholder="Digite o seu nome...">
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

        <input class="form--input-submit blue-color" type="submit" value="cadastrar">
    </form>
</div>

<div class="login-button">
    <a class="letter-blue-color" href="login.php">logar</a>
</div>

<?php require 'templates/footer.php';?>
