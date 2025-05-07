<?php 

include_once '../../config/config.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../public/login.php');
    exit;
}

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header('Location: ../../public/index.php');
    exit;
}

//falta implementar 

?>