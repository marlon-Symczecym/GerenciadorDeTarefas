<?php

define("HOST", "localhost");
define("DB", "gerenciadortarefas");
define("ROOT", "root");
define("PASS", "");

$pdo = new PDO("mysql:host=".HOST.";dbname=".DB, ROOT, PASS);

// CONSTANTES PROJETO
define("INCLUDE_PATH", "http://localhost/GerenciadorDeTarefas/");