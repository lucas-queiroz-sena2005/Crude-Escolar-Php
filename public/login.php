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

    $stmt = mysqli_prepare($conn, "SELECT username, administrador FROM usuario WHERE username = ? AND senha = ?");
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['usuario'] = $user['username'];
        
        if ($user['administrador'] == 1) {
            $_SESSION['admin'] = true;
        } else {
            $_SESSION['admin'] = false;
        }

        header('Location: index.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
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
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</body>
</html>
