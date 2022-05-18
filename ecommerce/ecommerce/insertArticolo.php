<?php
include("connection.php");

$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

$foto = $uploadfile;
$nomeArticolo = $_POST["nomeArticolo"];
$prezzo = $_POST["prezzo"];
$giacenza = $_POST["giacenza"];


$stmt = $conn->prepare("INSERT INTO articoli (immagine, nomeArticolo, prezzo, giacenza) 
          VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $foto, $nomeArticolo, $prezzo, $giacenza);

if ($stmt->execute() === true) {
  header("location:elencoArticoli.php?msg=articolo aggiunto con successo");
  return 0;
} else {
  header("location:aggiungiArticolo.php?msg=Errore nell'aggiunta dell'articolo");
}
$conn->close();
?>