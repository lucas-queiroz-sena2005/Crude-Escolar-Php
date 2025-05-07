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

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Bem-vindo à Área Administrativa</h2>
        <a href="../public/index.php" class="btn btn-primary">Lista de alunos</a>
        <a href="cadastro.php" class="btn btn-success">Cadastrar novo aluno</a>
        <a href="" class="btn btn-warning">Alterar registro de alunos</a>
        <a href="" class="btn btn-danger">Deletar registro de alunos</a>
        
    </div>
</body>
</html>
