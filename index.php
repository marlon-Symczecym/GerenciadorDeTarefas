<?php
session_start();

require_once 'config.php';



if($_SESSION['login']) {
    header("Location: views/index.php");
    exit;
} else {
    header("Location: views/login.php");
    exit;
}