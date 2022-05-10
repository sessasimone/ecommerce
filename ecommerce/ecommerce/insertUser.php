<?php
include("connection.php");
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$dataNascita = $_POST["dataNascita"];
$username = $_POST["username"];
$password = md5($_POST["password"]);

$stmt = $conn->prepare("INSERT INTO utenti (nome, cognome, dataNascita, username, password) 
          VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $cognome, $dataNascita, $username, $password);

if ($stmt->execute() === true) {
  header("location:index.php?msg=Registrazione avvenuta con successo");
} else {
  header("location:index.php?msg=Registrazione NON avvenuta con successo");
}


$conn->close();
?>