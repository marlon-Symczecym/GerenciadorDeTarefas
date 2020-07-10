<?php

session_start();

require_once '../config.php';
require_once '../models/Usuario.php';
require_once '../dao/UsuarioDao.php';

use dao\UsuarioDao;
use models\Usuario;

$name = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'password');

$user = new Usuario();
$user->setName($name);
$user->setPassword($password);

$usuarioDao = new UsuarioDao($pdo);
$usuarioDao->login($user);