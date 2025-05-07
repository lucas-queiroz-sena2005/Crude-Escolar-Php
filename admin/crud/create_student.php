<?php 

include_once '../../config/config.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../public/login.php');
    exit;
}

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header('Location: ../../public/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $ra = $_POST['ra'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO aluno (ra, cpf, nome, email, data_nascimento, curso) VALUES ('$ra', '$cpf', '$nome', '$email', '$data_nascimento', '$curso')";

    if (mysqli_query($conn, $sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . mysqli_error($conn);
    }

    // Redirecionar após cadastro
    header('Location: ../../public/index.php');
    exit(); 

} else {

    header('Location: ../cadastro.php');
    exit();

}

?>