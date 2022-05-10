<?php session_start();
include("connection.php");
$articolo = $_GET["articolo"];

echo "<center>";
echo "Confermi di voler rimuovere l'articolo selezionato? (" . $articolo . ")<br><br>";
echo "<button><a href='elimina.php?articolo=" . $articolo . "'>Conferma</a></button><br>";
echo "<button><a href='elencoArticoli.php?msg=l'articolo non è stato eliminato'>Annulla</a></button>";
echo "</center>";
echo "<center><br>";
$sqlIm = "SELECT immagine FROM articoli WHERE nomeArticolo = '$articolo'";
$resultIm = $conn->query($sqlIm);
while ($row = $resultIm->fetch_assoc()) {
    echo "<img src = '" . $row["immagine"] . "' width = '150' height = '200'>";
}
echo "</center>";
?>