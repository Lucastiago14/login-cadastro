<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "formulario";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$data_nascimento = $_POST['data_nascimento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 


$sql = "INSERT INTO usuarios (nome, email, telefone, sexo, data_nascimento, cidade, estado, endereco, senha) 
        VALUES ('$nome', '$email', '$telefone', '$sexo', '$data_nascimento', '$cidade', '$estado', '$endereco', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
?>


