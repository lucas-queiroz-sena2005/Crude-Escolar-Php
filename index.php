<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUD Escolar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">CRUD Escolar</a>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Lista de Registros</h2>
      <a href="create.php" class="btn btn-success">+ Adicionar Novo</a>
    </div>

    <!-- Tabela de dados -->
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <!-- Exemplo de item (depois substitua por PHP loop) -->
        <tr>
          <td>1</td>
          <td>João Silva</td>
          <td>joao@email.com</td>
          <td>
            <a href="edit.php?id=1" class="btn btn-sm btn-warning">Editar</a>
            <a href="delete.php?id=1" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
          </td>
        </tr>
        <!-- Fim do exemplo -->
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>