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
<?php 

$articolo = $_GET["articolo"];
$sql = "SELECT * FROM articoli WHERE ID = '$articolo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION["IDArticolo"] = $articolo;
    while ($row = $result->fetch_assoc()) {
        if (isset($_GET["msg"])) echo $_GET["msg"] . "<br>";
        echo"<div class='nomeArt'>";
        echo "<br><a href = 'elencoArticoli.php' class='btn btn-primary'>Torna alla HOME</a>";
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