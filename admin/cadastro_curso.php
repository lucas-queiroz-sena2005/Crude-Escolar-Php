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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO curso (nome) VALUES ('$nome')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../public/cursos.php');
        exit;
    } else {
        echo "Erro ao cadastrar curso: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastrar Novo Curso</h2>
        <a href="../public/cursos.php" class="btn btn-primary">Voltar</a>
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Curso</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </div>
</body>
</html>
