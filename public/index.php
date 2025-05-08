<?php

include_once '../config/config.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <header class="bg-secondary text-white p-3">
        <div class="container">
            <h1 class="h4">Sistema Acadêmico</h1>
        </div>
    </header>

    <main class="container flex-fill my-4">
        <?php
            if (isset($_GET['msg'])) {
                $msg = htmlspecialchars($_GET['msg']); 
                echo "<div class='alert alert-warning'>$msg</div>"; 
            }
        ?>

        <h2>Alunos Cadastrados</h2>

        <?php 
            $sql = "SELECT aluno.*, curso.nome AS curso_nome FROM aluno
                    LEFT JOIN curso ON aluno.curso_id = curso.id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table mt-3'>";
                echo "<thead><tr><th>RA</th><th>CPF</th><th>Nome</th><th>Email</th><th>Data de Nascimento</th><th>Curso</th><th>Ações</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ra'] . "</td>";
                    echo "<td>" . $row['cpf'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['data_nascimento'] . "</td>";
                    echo "<td>" . $row['curso_nome'] . "</td>";
                    echo "<td>";
                    if ($_SESSION['admin'] == true) {
                        echo "<a href='../admin/editar.php?ra=" . $row['ra'] . "' class='btn btn-warning btn-sm me-1'>Editar</a>";
                        echo "<a href='../admin/remover.php?ra=" . $row['ra'] . "' class='btn btn-danger btn-sm'>Excluir</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p class='mt-3'>Nenhum aluno cadastrado.</p>";
            }    
        ?>

        <div class="mt-4">
            <a href="cursos.php" class="btn btn-primary me-2">Ver Cursos</a>
            <?php 
                if ($_SESSION['admin'] == true) {
                    echo "<a href='../admin/admin.php' class='btn btn-primary me-2'>Área Administrativa</a>";
                }
            ?>
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </main>

    <footer class="bg-secondary text-white text-center p-3 mt-auto">
        <small>&copy; <?php echo date("Y"); ?> Sistema Acadêmico</small>
    </footer>

</body>
</html>
