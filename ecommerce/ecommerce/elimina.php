<?php session_start();
include("connection.php");
$articolo = $_GET["articolo"];
$sql = "DELETE FROM articoli  WHERE nomeArticolo = '$articolo'";
if ($conn->query($sql) === true) {
    header("location:elencoArticoli.php?msg=L'aticolo è stato eliminato");
} else {
    header("location:elencoArticoli.php?msg=L'articolo non è stato eliminato");
}
$conn->close();
?>