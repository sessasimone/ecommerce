<?php
include("connection.php");
session_start();

$profilo = $_POST["username"];
$sqlU = "SELECT * FROM utenti WHERE Username='$profilo'";
$result = $conn->query($sqlU);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    if ($row["username"] == $profilo && $row["password"] == md5($_POST["password"])) {
      $_SESSION["IDUtente"] = $row["ID"];
      header("location:elencoArticoli.php");
      return 0;
    } else {
      header("location:index.php?msg=Username/Password non corrispondono!");
    }
  }
}
$conn->close();