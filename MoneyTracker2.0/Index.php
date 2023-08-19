<?php
  require_once 'check_login.php';
    $user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html>

<head>

    <title>Home page</title>
    <link rel="stylesheet" href="MoneyTracker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <div class="meni">
        <a href="index">Home page</a>
        <a href="Budgeting">Budgeting</a>
        <a href="Overview">Overview</a>
        <a href="Tips">Tips</a>
        <a id="logout">Log me out</a> 
    </div>

    <div class="logo">
    <img src="images/logo.png" alt="Logotip projekta Moneytracker" style="width:inherit">
        <img src="images/YourBudget.png" alt="Moneytracker" style="width:inherit">
    </div>

    <div class="avatar">
        <img src="images/avatar.png" alt="Vaš izbran avatar" style="width:30px">
    </div>

    <div class="uporabnik">
        <p>
        <?php
          // Check if user data is available in the session
          if ($user["gender"] == 'F') {
              echo "Pozdravljena, " . $user["name"];
          } else {
              echo "Pozdravljen, " . $user["name"];
          }
          ?>
        </p>
    </div>

    <div class="poraba">
    <h2>Your monthly spending tracking</h2>
    <h3> Your amount: </h3>

    <div class="card">
    <h3> Category name: </h3>    
    </div>
    </div>


   

    <script src="baseJS.js">
    </script>
</body>

</html>