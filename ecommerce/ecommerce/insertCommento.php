<?php
include("connection.php");
session_start();
$IDArticolo = $_SESSION["IDArticolo"];
$IDUtente = $_SESSION["IDUtente"];
$commento = $_POST["commento"];
$stelline = $_POST["valutazione"];

$stmt = $conn->prepare("INSERT INTO commenti (IDArticolo, commento, stelline, IDUtente) 
          VALUES (?, ?, ?, ?)");
$stmt->bind_param("isii", $IDArticolo, $commento, $stelline, $IDUtente);

 if ($stmt->execute() === true) {
   header("location:elencoArticoli.php?msg=Commento aggiunto con successo");
 } else {
   header("location:elencoArticoli.php?msg=Errore nell'aggiunta del commento");
 }


$conn->close();
?>