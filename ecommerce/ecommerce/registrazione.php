<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
    <body>

    <div class="jumbotron text-center">
    <h1 style="color:cornflowerblue;">REGISTRAZIONE</h1>
  <p style="color:deepskyblue;">E-COMMERCE</p>
</div>
<center>
        <form action="insertUser.php" method="post">
                <?php if (isset($_GET["msg"])) echo $_GET["msg"] . "<br>" ?>
                <input type="text" name="nome" placeholder="nome" class="casella"><br>
                <br><input type="text" name="cognome" placeholder="cognome" class="casella"><br>
                <br> <div style="color:cornflowerblue;">DATA DI NASCITA</div> <input type="date" name="dataNascita" class="casella"><br>
                <br><input type="text" name="username" placeholder="username" class="casella"><br>
                <br><input type="password" name="password" placeholder="password" class="casella"><br>
                <br><input type="password" name="Cpassword" placeholder="ripeti password" class="casella"><br><br>
                <input type="submit" value="Registrati" class="btn btn-primary">
                <input type="reset" value="Cancella" class="btn btn-primary"><br>
        </form>
</center>
</body>

</html>