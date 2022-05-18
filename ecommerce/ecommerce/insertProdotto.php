<?php

include("connection.php");
session_start();
$articolo = $_GET["articolo"];
$utente = $_SESSION["IDUtente"];
$idCarrello;
$sqlC = "SELECT * from carrello where IDUtente =". $utente;
$resultC = $conn->query($sqlC);
if($resultC ->num_rows > 0){
  while($row = $resultC->fetch_assoc() ){
    $idCarrello = $row["ID"];
  }
}

$sqlA = "SELECT * FROM contiene WHERE IDArticolo=$articolo AND IDCarrello=$idCarrello";
$resultA = $conn->query($sqlA);
if ($resultA !== false && $resultA->num_rows > 0) {
  $sqlB = "SELECT * FROM contiene WHERE IDArticolo=$articolo AND IDCarrello=$idCarrello";
$resultQ = $conn->query($sqlB);
if($resultQ ->num_rows > 0){
  while($row = $resultQ->fetch_assoc() ){
    $quantità = $row["quantita"];
  }
}
    $quantità++;
    $stmt = $conn->prepare("UPDATE contiene SET quantita = " . $quantità . " WHERE IDArticolo = " . $articolo . "AND  IDCarrello=$idCarrello");
    $stmt->execute();
}else{
$quantità = 1;
$stmt = $conn->prepare("INSERT INTO contiene (IDArticolo, IDCarrello, quantita) 
          VALUES (?, ?, ?)");
$stmt->bind_param("iii", $articolo, $idCarrello, $quantità);
}

if ($stmt->execute() === true) {
  header("location:elencoArticoli.php?msg=articolo aggiunto al carrello");
  return 0;
} else {
  //echo $stmt->execute();
  echo $quantità;
  //header("location:elencoArticoli.php?msg=Errore nell'aggiunta dell'articolo al carrello");
}

$conn->close(); 
?>