<?php session_start();
 include("connection.php");
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
    <div class="jumbotron text-center">
    <a href = 'elencoArticoli.php'>
    <img src="img/HomeBlack.jpg"  width="40" height="40">
    </a>
  <h1 style="color:cornflowerblue;">CARRELLO</h1>
  <p style="color:deepskyblue;">E-COMMERCE</p> 
  
</div>

<div class="cart"><a href="elencoArticoli.php" style="color:white"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path  d="M256,2.938l-256,256v48.427h62.061v201.697h155.152V384.941h77.576v124.121h155.151V307.365H512v-48.427L256,2.938z
			 M403.394,260.82v201.697h-62.061V338.396H170.667v124.121h-62.061V260.82H63.943L256,68.762L448.057,260.82H403.394z" />
</svg>
</a>
</div>
        </div>
        <?php
         
          
            if(isset($_SESSION["IDUtente"])){
              $IDUtente = $_SESSION["IDUtente"];
              $idCarrello;
              $sqlC = "SELECT * from carrello where IDUtente =". $IDUtente;
              $resultC = $conn->query($sqlC);
              if($resultC ->num_rows > 0){
                while($row = $resultC->fetch_assoc() ){
                  $idCarrello = $row["ID"];
  }
}
            $sql = "SELECT * FROM articoli INNER JOIN contiene ON contiene.IDArticolo = articoli.ID WHERE contiene.IDCarrello = '$idCarrello'";
          }

        $result = $conn->query($sql);   //filtro ricerca

       while ($row = $result->fetch_assoc()) {
        $articolo = $row["ID"];
        $articoloVista=$row["IDArticolo"] ;
        echo "<div class='container'>"; 
        echo "<div class='row'>";
        echo "<div class='col-sm-4'>";
        echo "<div class='casella'>";
        echo "<a href='articolo.php?articolo=" . $articoloVista . "'>" . $row["nomeArticolo"] ."";
        echo "<br>";
        echo "<img src = '" . $row["immagine"] . "' width = '150' height = '200'>";
        echo "</a>";
        echo "<br>";
        echo " <p >". 'prezzo ' . $row["prezzo"] . ' ???' ."</p>";
        echo " <p >". 'quantit?? ' . $row["quantita"] ."</p>";
        echo "</div>";
        echo "</div>";

    }
    // echo "<br><form action = 'insertProdotto.php?articolo=". $articolo."' method = 'post'>";
    // echo "<input type = 'submit'  class='btn btn-primary' value = 'Aggiungi al carrello'>";                   
    // echo "</form>"
    
        ?>
        
    </center>
</body>

</html>