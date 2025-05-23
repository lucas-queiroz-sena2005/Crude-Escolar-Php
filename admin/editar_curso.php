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
    $id = $_GET['id'];
    
    // Buscar dados do curso
    $sql = "SELECT * FROM curso WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "Curso não encontrado!";
        exit;
    }

    $curso = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];

        $sql = "UPDATE curso SET nome = '$nome' WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            header('Location: ../public/cursos.php?msg=Curso alterado com sucesso!');
            exit;
        } else {
            header('Location: ../public/cursos.php?msg=Erro ao alterar curso!');
            exit;
        }
    }
} else {
    header('Location: ../public/cursos.php?msg=Curso não encontrado!');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Curso</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Curso</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $curso['nome']; ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Salvar</button>
        </form>
    </div>
</body>
</html>
