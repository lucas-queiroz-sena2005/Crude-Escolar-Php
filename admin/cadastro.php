<?php

include_once '../config/config.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../public/login.php');
    exit;
}

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header('Location: ../../public/index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
        <h2>Cadastrar Novo Aluno</h2>
        <a href="admin.php" class="btn btn-primary">Voltar</a>
        <form method="POST" action="crud/create_student.php">

            <!-- RA -->
            <div class="mb-3">
                <label for="ra" class="form-label">RA</label>
                <input type="text" name="ra" class="form-control" required>
            </div>

            <!-- CPF -->
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>

            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Data -->
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" required>
            </div>
            
            <!-- Curso -->
            <div class="mb-3">
                <label for="curso" class="form-label">Curso Matriculado</label>
                <input type="curso" name="curso" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar</button>

        </form>
    </div>
</body>
</html>
