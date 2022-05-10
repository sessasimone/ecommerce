<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
    <body>

    <div class="jumbotron text-center">
    <h1 style="color:cornflowerblue;">AGGIUNGI ARTICOLO</h1>
  <p style="color:deepskyblue;">E-COMMERCE</p>
</div>
        <center>
            <form action = "insertArticolo.php" method = "post" enctype="multipart/form-data">
                <input type="file"  name = "file"  >
                <br><input type="text" class="casella" name="nomeArticolo" placeholder="nome articolo"><br> 
                <br><input type="float" class="casella" name="prezzo" placeholder="prezzo"><br> 
                <br><input type="int" class="casella" name=" placeholder="quantità"><br> <br>   
                <input type="submit" value="Invia" class="btn btn-info">
            </form>
        </center>
    </body>
</html>