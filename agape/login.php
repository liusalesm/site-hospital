<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "agape";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " .$conn->connect_error);
}

$nome = $_POST['name'];
$email = $_POST['email'];
$senha = password_hash($_POST['password'], PASSWORD_BCRYPT);
$tipo = $_POST['role'];
$especializacao = $_POST['specialization'] ?? null;


$sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
if ($conn->query($sql) === TRUE) {
    if ($tipo === 'medico' && $especializacao) {
        $sqlMedico = "INSERT INTO medicos (especializacao) VALUES ('$especializacao')";
        $conn->query($sqlMedico);
    }
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
