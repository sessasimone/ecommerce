<?php session_start();
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
  <h1 style="color:cornflowerblue;">COMMENTO</h1>
  <p style="color:deepskyblue;">E-COMMERCE</p> 
  
</div>
<div class="title2">
<br><a href = 'elencoArticoli.php' class='btn btn-info'>Torna alla HOME</a>
        </div>
        <form action = "insertCommento.php" method = "post" enctype="multipart/form-data">
                
                <br><input type="text" class="casella" name="commento" placeholder="commento"><br>
                <div style="color:cornflowerblue;">valutazione⭐</div>
                
  <input type="radio" id="1" name="valutazione" value="1">
<label for="1">1</label>
  <input type="radio" id="2" name="valutazione" value="2">
<label for="2">2</label>
  <input type="radio" id="3" name="valutazione" value="3">
<label for="3">3</label>
  <input type="radio" id="4" name="valutazione" value="4">
<label for="4">4</label>
  <input type="radio" id="5" name="valutazione" value="5">
<label for="5">5</label><br>
                <input type="submit" value="Invia" class="btn btn-info">
            </form>
        
    </center>
</body>

</html>