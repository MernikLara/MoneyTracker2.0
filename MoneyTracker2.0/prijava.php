<?php
  require_once 'check_logged_out.php';
?>
<!DOCTYPE html>
<html>

<head>

  <title>Prijava</title>
  <link rel="stylesheet" href="MoneyTracker.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
<div class=prijava1>
<img src="images/Welcome.png" alt="Welcome" style="max-width:80%">
</div>

  <div class=prijava1>
  <div id="prijava">
    
  <h1>Log in</h1>

    <form id="prijavaForm">
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email"><br>
      <label for="geslo">Password</label><br>
      <input type="password" id="geslo" name="geslo"><br><br>
      <input type="submit" id="prijavaSubmit" value="Log me in">
    </form><br>
    
    <input type="button" id="registracijaRedirect" value="Registration">
  </div>
  </div>

<script src="baseJS.js"></script>
</body>

</html>