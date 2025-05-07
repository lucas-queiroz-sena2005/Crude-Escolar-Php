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

if (!isset($_GET['ra'])) {
    echo "Aluno não encontrado!";
    exit;
}

$ra = $_GET['ra'];
$sql = "SELECT * FROM aluno WHERE ra = '$ra'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Aluno não encontrado!";
    exit;
}

$aluno = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];

    $sql = "UPDATE aluno SET nome = '$nome', data_nascimento = '$data_nascimento', cpf = '$cpf' WHERE ra = '$ra'";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Aluno</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="ra" class="form-label">RA</label>
                <input type="text" name="ra" class="form-control" value="<?php echo $aluno['ra']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $aluno['nome']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" value="<?php echo $aluno['data_nascimento']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $aluno['cpf']; ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Salvar</button>
        </form>
    </div>
</body>
</html>
