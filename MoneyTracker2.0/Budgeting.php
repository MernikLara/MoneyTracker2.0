<?php
  require_once 'check_login.php';
    $user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Budgeting</title>
    <link rel="stylesheet" href="MoneyTracker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

    <div class="avatar">
        <img src="images/avatar.png" alt="Your avatar" style="width:30px">
    </div>

    <div class="budget">
    <div>
        <img src="images/Why.png" alt="Why is budgeting important" style="width: 900px;">
        <h2> Learn more about how to design your budget <a href="Tips">here!</a>
</h2> 
    </div>
    <div class="budget1">

    <form id="bugetTableForm">
    <h2> Design your budget here: </h2>
    <th>Your budget:</th>
    <input type="number" name="buget" placeholder="Budget" required></td><br><br><br>
    <table id="budgetTable">
    <thead>
    <tr>
        <th>Category</th>
        <th>Desired Max Spending Limit</th>
        <th>Average Expense</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td><input type="text" name="category-1" placeholder="Category 1" require></td>
        <td><input type="number" name="max_limit-1" placeholder="Max Limit 1" require></td>
        <td><input type="number" name="avg_expense-1" placeholder="Average Expense 1" require></td>
      </tr>
    </tbody>
    </table>
  
  <br>
  
  <button type="button" onclick="addRow()">Add Row</button>
  <input type="submit" id="bugetTableSubmit" value="Submit">
</form>

</div>
</div>

    <div class="uporabnik">
        <p>
        <?php
          // Check if user data is available in the session
          if ($user["gender"] == 'F') {
              echo "Hello miss " . $user["name"];
          } else {
              echo "Hello mister " . $user["name"];
          }
          ?>
        </p>
    </div>


   

    <script src="baseJS.js">
    </script>
</body>

</html>