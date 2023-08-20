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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
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
    <div class="pieChartContainer">
        <canvas id="pieChart"></canvas>
    </div>
        <button id="exportPdfButton">Export as PDF</button>
    </div>
    
    <script src="baseJS.js"></script>
    <script>
        
    $( document ).ready(function() {
        generatePieChart();
    });
    

    function saveToPDF() {
        window.jsPDF = window.jspdf.jsPDF;
        const canvas = document.getElementById('pieChart');
        const pdf = new jsPDF();

        const canvasImgData = canvas.toDataURL("image/jpeg", 1.0);
        pdf.addImage(canvasImgData, 'JPEG', 10, 10, 190, 100);

        pdf.save("pie_chart.pdf");
    }
        document.getElementById('exportPdfButton').addEventListener('click', saveToPDF);
    </script>
</body>

</html>