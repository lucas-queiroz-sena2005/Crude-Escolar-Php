<?php

include_once '../config/config.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../public/login.php');
    exit;
}

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header('Location: ../public/index.php');
    exit;
}

if (isset($_GET['ra'])) {
    $ra = $_GET['ra'];

    $sql = "DELETE FROM aluno WHERE ra = '$ra'";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../public/index.php?msg=Aluno excluído com sucesso'); 
        exit;
    } else {
        header('Location: ../public/index.php?msg=Erro ao excluir aluno!');
        exit; 
    }
} else {
    header('Location: ../public/index.php?msg=Aluno não encontrado!'); 
    exit;
}

?>
