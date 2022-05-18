<?php 
session_start();
include("connection.php");
?>
<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <center>

  <!-- <div class="cart"><a href="elencoArticoli.php" style="color:white"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M57.863,26.632L29.182,0L0.502,26.632c-0.404,0.376-0.428,1.009-0.052,1.414c0.374,0.404,1.009,0.427,1.413,0.052
	l4.319-4.011v3.278v31h16v-18c0-3.866,3.134-7,7-7s7,3.134,7,7v18h16v-31v-3.278l4.319,4.011c0.192,0.179,0.437,0.267,0.681,0.267
	c0.269,0,0.536-0.107,0.732-0.319C58.291,27.641,58.267,27.008,57.863,26.632z"/> -->
</svg>
</a>
</div>
<?php 

$articolo = $_GET["articolo"];
$sql = "SELECT * FROM articoli WHERE ID = '$articolo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION["IDArticolo"] = $articolo;
    while ($row = $result->fetch_assoc()) {
        if (isset($_GET["msg"])) echo $_GET["msg"] . "<br>";
        echo"<div class='nomeArt'>";
        // echo "<br><a href = 'elencoArticoli.php'><img src='img/HomeBlack.jpg'  width='40' height='40'></a>";
        echo "<form action = 'elencoArticoli.php' method = 'get'>";
                    echo "<input type = 'submit'  class='btn btn-primary' value = 'Home'>";                   
                    echo "</form>";
        echo "<h2>" . $row["nomeArticolo"] . "</h2>";
        echo"</div>";
        echo "<img src = '" . $row["immagine"] . "' width = '400' height = '500'><br>";
        echo "<br><b>prezzo: </b>" . $row["prezzo"] . " €<br><td>";
        echo "<td><b>quantità disponibile: </b>" . $row["giacenza"] . "<br><td>";
        echo "<br><form action = 'carrello.php' method = 'get'>";
                    echo "<input type = 'submit'  class='btn btn-primary' value = 'Aggiungi al carrello'>";                   
                    echo "</form>";
                    echo "<form action = 'commento.php' method = 'get'>";
                    echo "<input type = 'submit'  class='btn btn-primary' value = 'Aggiungi commento'>";                   
                    echo "</form>";
                    echo"<br>";            
        
    }
} else {
    echo "Errore durante il caricamento dell'articolo";
}
?>


</center>

<?php
    $idarticolo = $_SESSION["IDArticolo"];
    $sqlC = "SELECT * FROM commenti JOIN utenti ON commenti.IDUtente = utenti.ID WHERE IDArticolo = '$idarticolo'";
    $resultC = $conn->query($sqlC);

    if ($resultC->num_rows > 0) {
        while ($rowC = $resultC->fetch_assoc()) {
            echo "<div class='container'>"; 
            echo "<div class='row'>";
            echo "<div class='col-sm-4'>";
            echo "<div class='casellaC'>";
            echo "<a>".$rowC["username"]."</a>  ".$rowC["stelline"]."⭐"; 
            echo "<br>";
            echo $rowC["commento"];
            echo"<br>";
            echo"<br>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Errore durante il caricamento dei commenti";
    }
?>
</html>