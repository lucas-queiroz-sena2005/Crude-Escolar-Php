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

//falta implementar 

// Dados fictícios para edição (no futuro, você pode buscar os dados no banco)
$aluno = [
    'ra' => '12345',
    'nome' => 'João Silva',
    'data_nascimento' => '2000-01-01',
    'cpf' => '123.456.789-00'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Atualizar os dados (simulação)
    $aluno['nome'] = $_POST['nome'];
    $aluno['data_nascimento'] = $_POST['data_nascimento'];
    $aluno['cpf'] = $_POST['cpf'];

    // Redirecionar após edição
    header('Location: index.php');
    exit;
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
