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
<body class="d-flex flex-column min-vh-100">

    <header class="bg-secondary text-white p-3">
        <div class="container">
            <h1 class="h4">Sistema Acadêmico</h1>
        </div>
    </header>

    <main class="container flex-fill my-4">
        <h2>Bem-vindo à Área Administrativa</h2>

        <div class="mt-3">
            <a href="../public/index.php" class="btn btn-primary">Lista de alunos</a>
        </div>
        <div class="mt-2">
            <a href="cadastro.php" class="btn btn-success">Cadastrar novo aluno</a>
        </div>
        <div class="mt-2">
            <a href="../public/cursos.php" class="btn btn-primary">Lista de cursos</a>
        </div>
        <div class="mt-2">
            <a href="cadastro_curso.php" class="btn btn-success">Cadastrar novo curso</a>
        </div>
    </main>

    <footer class="bg-secondary text-white text-center p-3 mt-auto">
        <small>&copy; <?php echo date("Y"); ?> Sistema Acadêmico</small>
    </footer>

</body>
</html>
