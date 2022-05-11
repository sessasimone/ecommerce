<?php

include("connection.php");
session_start();
$articolo = $_GET["articolo"];
$utente = $_SESSION["IDUtente"];


$sqlA = "SELECT * FROM carrello WHERE IDArticolo=$articolo AND IDUtente=$utente";
$resultA = $conn->query($sqlA);
if ($resultA !== false && $resultA->num_rows > 0) {
  $sqlB = "SELECT quantita FROM carrello WHERE IDArticolo=$articolo AND IDUtente=$utente";
$quantità = $conn->query($sqlB);
    $quantità++;
    $stmt = $conn->prepare("UPDATE carrello SET quantita = " . $quantità . " WHERE IDArticolo = " . $articolo . "");
    $stmt->execute();
}else{

$stmt = $conn->prepare("INSERT INTO carrello (IDArticolo, IDUtente, quantita) 
          VALUES (?, ?, ?)");
$stmt->bind_param("iii", $articolo, $utente, $quantità);
}

if ($stmt->execute() === true) {
  header("location:elencoArticoli.php?msg=articolo aggiunto al carrello");
  return 0;
} else {
  header("location:aggiungiArticolo.php?msg=Errore nell'aggiunta dell'articolo al carrello");
}

$conn->close();
?>