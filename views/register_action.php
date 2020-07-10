<?php

require_once '../config.php';
require_once '../models/Usuario.php';
require_once '../dao/UsuarioDao.php';

use dao\UsuarioDao;
use models\Usuario;

$name = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'password');
$password_confirmation = filter_input(INPUT_POST, 'password_confirmation');

$hash = password_hash($password, PASSWORD_DEFAULT);

$newUser = new Usuario();
$newUser->setName($name);
$newUser->setPassword($hash);

$userDao = new UsuarioDao($pdo);
$userDao->register($newUser, $hash);