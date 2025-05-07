<?php 

include_once '../config/config.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header('Location: ../index.php');
    exit;
}

//falta implementar 

?>