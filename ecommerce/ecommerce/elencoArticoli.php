<?php 
include("connection.php");
session_start();
?>
<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
    <center>
    <div class="title">
  <div class="hh1">E-COMMERCE</div>
  <div>Sessa Simone</div> 
  <div class="cart"><a href="carrello.php" style="color:white"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />
</svg>
</a>
</div>

  
</div>
<div class="title2">
<form action="elencoArticoli.php" method="get">
            <input type="text" name="filtro" style="color:black;" placeholder="cerca articolo">
            <input type="submit" class="btn btn-primary" value="🔍"><br>
            <div class="sinistra">
            <a href="elencoArticoli.php" class='btn btn-info'>visualizza tutto</a>
            </div>
        </form>
        
        <?php
            echo "<form class='centro' action = 'login.php' method = 'get'>";
                    echo "<input  type = 'submit'  class='btn btn-info' value = 'cambia account'>";
                    echo "</form>";
                    ?>
  
               
<?php
include("connection.php");
$profilo1 = $_SESSION["IDUtente"];
        $sqlA = "SELECT admin FROM Utenti WHERE ID = '$profilo1'";
        $resultA = $conn->query($sqlA);
        if ($resultA->num_rows > 0) {
            while ($rowA = $resultA->fetch_assoc()) {
                if ($rowA["admin"] == 1) {
                    echo "<form class='destra' action = 'aggiungiArticolo.php' method = 'get'>";
                    echo "<input  type = 'submit'  class='btn btn-info' value = 'Aggiungi un articolo'>";                   
                    echo "</form>";
                    
                }
            }
        }
        
        ?>
</div>   
            <?php
            include("connection.php");
            if (isset($_GET["msg"])) echo "<b>" . $_GET["msg"] . "</b><br>";
            $profilo = $_SESSION["IDUtente"];
            //$articolo = $_SESSION["articolo"];
            $sqlA = "SELECT Admin FROM Utenti WHERE ID = '$profilo'";
            $resultA = $conn->query($sqlA);

            if (isset($_GET["filtro"]) && $_GET["filtro"] != "") {
                $filtro = $_GET["filtro"];
                $sql = "SELECT * FROM articoli WHERE nomeArticolo LIKE '%$filtro%'";
            } else {
                $sql = "SELECT * FROM articoli";
            }
            $result = $conn->query($sql);

            if ($result->num_rows > 0 && $resultA->num_rows > 0) {
                while ($rowA = $resultA->fetch_assoc()) {
                    if ($rowA["Admin"] == 1) {
                        while ($row = $result->fetch_assoc()) {
                            $articolo = $row["ID"];
                            echo "<div class='container'>"; 
                            echo "<div class='row'>";
                            echo "<div class='col-sm-4'>";
                            echo "<div class='casella'>";
                            echo "<a href='articolo.php?articolo=" . $articolo . "'>" . $row["nomeArticolo"] ."";
                            echo "<br>";
                            echo "<img src = '" . $row["immagine"] . "' width = '150' height = '200'>";
                            echo "</a>";
                            echo "<br>";
                            echo " <p >". 'prezzo ' . $row["prezzo"] . ' €' ."</p>";
                            echo " <p >". 'quantità ' . $row["giacenza"] ."</p>";
                            echo "<br><form action = 'insertProdotto.php?articolo=". $articolo."' method = 'post'>";
                            echo "<input type = 'submit'  class='btn btn-primary' value = 'Aggiungi al carrello'>";                   
                            echo "</form>";
                            echo "<a href='confermaElimina.php?articolo=" . $articolo . "'>";
                            echo "<a class='btn btn-info' href='confermaElimina.php?articolo=" . $articolo . "' style='color:white'>Elimina Articolo</a>";                   
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                            
                        }
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            $articolo = $row["ID"]; 
                            echo "<div class='container'>"; 
                            echo "<div class='row'>";
                            echo "<div class='col-sm-4'>";
                            echo "<div class='casella'>";
                            echo "<a href='articolo.php?articolo=" . $articolo . "'>" . $row["nomeArticolo"] ."";
                            echo "<br>";
                            echo "<img src = '" . $row["immagine"] . "' width = '150' height = '200'>";
                            echo "</a>";
                            echo "<br>";
                            echo " <p >". 'prezzo ' . $row["prezzo"] . ' €' ."</p>";
                            echo " <p >". 'quantità ' . $row["giacenza"] ."</p>";
                            echo "<br><form action = 'insertProdotto.php?articolo=". $articolo."' method = 'post'>";
                            echo "<input type = 'submit'  class='btn btn-primary' value = 'Aggiungi al carrello'>";                   
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                           
                        }
                    }
                }
            } else {
                echo "0 risultati trovati";
            }
            ?>
        </table>

       
        
        
    </center>
</body>

</html>