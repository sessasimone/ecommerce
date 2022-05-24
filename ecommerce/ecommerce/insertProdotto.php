<?php

include("connection.php");
session_start();
$articolo = $_GET["articolo"];
$utente = $_SESSION["IDUtente"];
$idCarrello=7;
$sqlC = "SELECT * from carrello where IDUtente =". $utente;
$resultC = $conn->query($sqlC);
if($resultC ->num_rows > 0){
  while($row = $resultC->fetch_assoc() ){
    $idCarrello = $row["ID"];
  }
}
$result;
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
    $stmt = "UPDATE contiene SET quantita = " . $quantità . " WHERE IDArticolo = " . $articolo . " AND  IDCarrello=$idCarrello";
    $conn->query($stmt);
}else{
$quantità = 1;
$stmt = "INSERT INTO contiene (IDArticolo, IDCarrello, quantita) 
          VALUES ($articolo,$idCarrello , $quantità)";
          $result = $conn->query($stmt);
}

if ( $conn->query($stmt) === true) {
  header("location:elencoArticoli.php?msg=articolo aggiunto al carrello");
  //return 0;
} else {
  //echo $stmt->execute();
  echo  $result==Null;
  //header("location:elencoArticoli.php?msg=Errore nell'aggiunta dell'articolo al carrello");
}

$conn->close(); 
?>