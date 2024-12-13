<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "agape";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$mensagem = $_POST['feedback'] ?? null;

if ($mensagem) {
    $sql = "INSERT INTO feedback (mensagem) VALUES ('$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback enviado com sucesso!";
    } else {
        echo "Erro ao enviar o feedback: " . $conn->error;
    }
} else {
    echo "Por favor, escreva uma mensagem de feedback.";
}

$conn->close();
?>
