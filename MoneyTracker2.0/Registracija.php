<?php
  require_once 'check_logged_out.php';
?>
<!DOCTYPE html>
<html>
<head>

    <title>Registracija</title>
    <link rel="stylesheet" href="MoneyTracker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <div id="logo-prijava">
      <img src="logo.png" alt="Moneytracker logo" style="width:inherit">
    </div>
  
    <h1>Register yourself and save money</h1>
  
    <div id="registracija">
      <form id="registracijaForm" method="post">
        <label for="ime">Name and surname:</label><br>
        <input type="text" id="ime" name="ime" required><br><br>

        <label for="spol">Gender:</label><br>
        <input type="radio" id="spolM" name="spol" value="M" checked="checked" >
        <label for="spol">Male</label><br>
        <input type="radio" id="spolZ" name="spol" value="F">
        <label for="spol">Female</label><br><br>

        <label for="rojstvo">Date of birth:</label><br>
        <input type="date" id="datumRojstva" name="rojstvo" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="geslo">Password</label><br>
        <input type="password" id="geslo" name="geslo" required><br><br>

        <input type="button" id="registracijaSubmit" value="Register me">
      </form>

      <p> Do you have MoneyTracker account already? <a href="Prijava">Sign in here!</a>
    </div>
  

  <script type="text/javascript" src="baseJS.js"></script>
</body>

</html>