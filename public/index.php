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
<body>
    <div class="container mt-5">
        <h2>Alunos Cadastrados</h2>
        <a href="logout.php" class="btn btn-danger mb-3">Sair</a>

        <?php 
            if($_SESSION['admin'] == true) {
                echo "<a href='../admin/admin.php' class='btn btn-primary mb-3'>Área Administrativa</a>";
            }
        ?>
    
        <?php 
            // Mostra lista de alunos cadastrados
            $sql = "SELECT * FROM aluno";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table mt-3'>";
                echo "<thead><tr><th>RA</th><th>CPF</th><th>Nome</th><th>Email</th><th>Data de Nascimento</th><th>Curso</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ra'] . "</td>";
                    echo "<td>" . $row['cpf'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['data_nascimento'] . "</td>";
                    echo "<td>" . $row['curso'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhum aluno cadastrado.";
            }    
        ?>
    </div>
</body>
</html>
