<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$database = "formulario";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}


$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    
    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['nome'];
        echo "Login bem-sucedido!";
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$conn->close();
?>
