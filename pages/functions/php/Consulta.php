<?php


$barbeiro = $_POST['barbeiro'];
$horario = $_POST['horario'];

$host = 'localhost';
$db = 'barbearia';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);
$sql = "SELECT * FROM cadastro WHERE barbeiro = ? AND horario = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("is", $barbeiro, $horario);
$stmt->execute();

if ($stmt->num_rows > 0) {
    echo 'ja_marcada';
} else {
    echo 'disponivel';
}

?>
