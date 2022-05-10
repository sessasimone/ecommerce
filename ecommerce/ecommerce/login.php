<?php session_start();?>
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
  <h1 style="color:cornflowerblue;">E-COMMERCE</h1>
  <p style="color:deepskyblue;">Sessa Simone</p>
  </div>
    
    <form action="chkLogin.php" method="post">
        <?php if (isset($_GET["msg"])) echo $_GET["msg"] . "<br>" ?>
        <input type="text" name="username" class="casella" placeholder="username" required><br>
        <br><input type="password" name="password" class="casella" placeholder="password" required><br><br>
        <input type="submit" class='btn btn-info' value="Login">
        <input type="reset" class='btn btn-info' value="Cancella"><br><br>
        <a href="registrazione.php" class="btn btn-primary">registrati</a>
    </form>
</center>

</body>

</html>