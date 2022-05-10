<?php
include("connection.php");

$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

$foto = $uploadfile;
$nomeArticolo = $_POST["nomeArticolo"];
$prezzo = $_POST["prezzo"];
$quantita = $_POST["quantita"];


$stmt = $conn->prepare("INSERT INTO articoli (immagine, nomeArticolo, prezzo, quantita) 
          VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $foto, $nomeArticolo, $prezzo, $quantita);

if ($stmt->execute() === true) {
  header("location:elencoArticoli.php?msg=articolo aggiunto con successo");
  return 0;
} else {
  header("location:aggiungiArticolo.php?msg=Errore nell'aggiunta dell'articolo");
}
$conn->close();
?>