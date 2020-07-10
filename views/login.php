<?php
require 'templates/header.php';
?>

<div class="layout--image login--image"></div>

<div class="form login--form">

    <h1 class="letter-blue-color title">login</h1>

    <form action="login_action.php" method="post" autocomplete="off">
        <div class="login--form-name">
            <label class="letter-blue-color form--label" for="name">Nome</label>
            <br>
            <input class="form--input-text" type="text" name="name" id="name" placeholder="Digite o seu nome...">
        </div>

        <div class="login--form-password">
            <label class="letter-blue-color form--label" for="password">Senha</label>
            <br>
            <input class="form--input-password" type="password" name="password" id="password" placeholder="Digite a sua senha...">
        </div>

        <input class="form--input-submit green-color" type="submit" value="logar">
    </form>
</div>

<div class="register-button">
    <a class="letter-green-color" href="register.php">cadastrar</a>
</div>

<?php require 'templates/footer.php';?>
