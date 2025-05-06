<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Dados fictícios para exemplo de alunos
$alunos = [
    ['ra' => '12345', 'nome' => 'João Silva', 'data_nascimento' => '2000-01-01', 'cpf' => '123.456.789-00'],
    ['ra' => '67890', 'nome' => 'Maria Oliveira', 'data_nascimento' => '1998-03-25', 'cpf' => '987.654.321-00']
];
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
        <h2>Área Administrativa</h2>
        <a href="logout.php" class="btn btn-danger mb-3">Sair</a>
        <a href="cadastro.php" class="btn btn-success mb-3">Cadastrar Novo Aluno</a>
        <table class="table">
            <thead>
                <tr>
                    <th>RA</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno) : ?>
                    <tr>
                        <td><?php echo $aluno['ra']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['data_nascimento']; ?></td>
                        <td><?php echo $aluno['cpf']; ?></td>
                        <td>
                            <a href="editar.php?ra=<?php echo $aluno['ra']; ?>" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
