<?php 
// definindo as variáveis de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "crud-escolar";

// criando a conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// verificando a conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


