<?php

include_once '../config/config.php';

session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $usuario = $_POST['username'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuario (username, senha) VALUES ('$usuario', '$senha')";

    if (mysqli_query($conn, $sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . mysqli_error($conn);
        $erro = "Erro ao criar conta!";
    }

    // Redirecionar após cadastro
    header('Location: ../public/login.php');
    exit(); 
} 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Criar Conta</h2>
        <?php if (isset($erro)) { echo "<div class='alert alert-danger'>$erro</div>"; } ?>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Usuário</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</body>
</html>
