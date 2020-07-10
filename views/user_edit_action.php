<?php
session_start();

require_once '../config.php';
require_once '../models/Usuario.php';
require_once '../dao/UsuarioDao.php';

use dao\UsuarioDao;
use models\Usuario;

$name = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'password');
$password_confirmation = filter_input(INPUT_POST, 'password_confirmation');

if(strlen($password) > 0) {
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new Usuario();
    $newUser->setId($_SESSION['user_id']);
    $newUser->setName($name);
    $newUser->setPassword($hash);

    $userDao = new UsuarioDao($pdo);
    $userDao->update($newUser, $hash);
} else {
    $newUser = new Usuario();
    $newUser->setId($_SESSION['user_id']);
    $newUser->setName($name);

    $userDao = new UsuarioDao($pdo);
    $userDao->update($newUser);
}