<?php
  require_once 'check_login.php';
    $user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html>

<head>

    <title>Your financial overview</title>
    <link rel="stylesheet" href="MoneyTracker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>

<body>

    <div class="meni">
        <a href="index">Home page</a>
        <a href="Budgeting">Budgeting</a>
        <a href="Overview">Overview</a>
        <a href="Tips">Tips</a>
        <a href="Logout">Log me out</a> 
        <div id="LogOut">
          <form action="logout.php" method="post">
          </form>
        </div>


    </div>
    <div class="logo">
    <img src="images/logo.png" alt="Logo Moneytracker" style="width:inherit">
        <img src="images/YourBudget.png" alt="Moneytracker" style="width:inherit">
    </div>

    <div id="tableContainer"></div>
    <div class="overview">
        <h1> Your financial overview </h1>
        <button id="exportPdfButton" onclick="exportTableToPdf()">Export as PDF</button>
    </div>
    
    <script src="statsJS.js"></script>
</body>

</html>