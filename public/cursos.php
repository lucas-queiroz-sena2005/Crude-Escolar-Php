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
    <title>Lista de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cursos Cadastrados</h2>
        <a href="cadastro_curso.php" class="btn btn-success mb-3">Cadastrar Novo Curso</a>
        
        <a href="index.php" class="btn btn-primary mb-3">Voltar para Alunos</a>

        <?php
            $sql = "SELECT * FROM curso";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table mt-3'>";
                echo "<thead><tr><th>ID</th><th>Nome do Curso</th><th>Ações</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>
                            <a href='editar_curso.php?id=" . $row['id'] . "' class='btn btn-warning'>Editar</a>
                            <a href='remover_curso.php?id=" . $row['id'] . "' class='btn btn-danger'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhum curso cadastrado.";
            }
        ?>
    </div>
</body>
</html>
