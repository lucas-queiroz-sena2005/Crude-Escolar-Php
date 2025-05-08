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

if (isset($_GET['id'])) {
    $curso_id = $_GET['id'];

    $sql = "DELETE FROM curso WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $curso_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../public/cursos.php?msg=Curso excluído com sucesso');
        exit;
    } else {
        header('Location: ../public/cursos.php?msg=Erro ao excluir o curso');
        exit;
    }
} else {
    header('Location: ../public/cursos.php?msg=Curso não encontrado');
    exit;
}
