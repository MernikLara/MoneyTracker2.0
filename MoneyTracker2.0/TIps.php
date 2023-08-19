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

    <div>
        <br>
        <div class="nasveti">
        <div class="nasveti1">
<h1>Your first introduction to budgeting<h1>
<h2> Why is budgeting important? </h2>
<p> In summary, personal budgeting is a valuable tool that can help you manage your money, achieve your financial goals, and ultimately lead to greater financial stability and peace of mind.
With correct budgeting you can achieve the following: <br><br>
<b>Financial Awareness:</b> Budgeting helps you understand where your money is coming from and where it's going. This awareness allows you to make informed decisions about your spending and saving habits.<br><br>
<b>Goal Achievement:</b>  Setting financial goals becomes easier when you have a budget in place. Whether you're saving for a vacation, a new car, or a down payment on a house, a budget helps you allocate funds toward these goals.<br><br>
<b>Control over Spending:</b>  A budget empowers you to control your spending. By tracking expenses, you can identify areas where you might be overspending and make adjustments accordingly.<br><br>
<b>Debt Management:</b>  Budgeting can be a powerful tool for managing and reducing debt. You can allocate a portion of your budget toward paying off debts more quickly, which can lead to improved financial stability.<br><br>
<b>Emergency Preparedness:</b>  Creating an emergency fund is an essential part of budgeting. Having a reserve of funds set aside for unexpected expenses can provide peace of mind during challenging times.<br><br>
<b>Savings Growth:</b>  A budget allows you to systematically save money over time. Whether it's for retirement, education, or other long-term goals, budgeting helps your savings grow consistently.<br><br>
<b>Reduced Financial Stress:</b>  Knowing that you have a plan for your finances can reduce stress and anxiety related to money matters. It can also prevent the feeling of living paycheck to paycheck.<br><br>
<b>Improved Decision-Making:</b>  With a clear understanding of your financial situation, you can make more informed decisions about purchases, investments, and other financial choices.<br><br>
<b>Long-Term Financial Health:</b>  Budgeting promotes financial discipline and responsible spending habits. Over time, this can lead to improved financial health and a better overall financial outlook.<br><br>
<b>Peace of Mind:</b>  Knowing that you're in control of your finances and are working toward your goals can provide a sense of peace and security.
Flexibility: A budget doesn't have to be rigid. It can be adjusted as your circumstances change, allowing you to adapt to new financial goals, expenses, and income fluctuations. </p>
</div>        
<div class="nasveti1">
 <h2> Some of the most famous budgeting principles: </h2>
 <h3>50/30/20 principle</h3>  
 <p>In this budgeting principle you devide your spending into 3 cathegories:<br><br>
<b>NEEDS:</b> Such as: housing, utilities, food, basic clothing, health insurance, transportation, childcare, others </p>
<b>WANTS:</b> Such as: streaming services, subscriptions, eating out, shopping sprees, travel, intertainment, etc. </p>
<b>SAVINGS GOALS: </b>Such as savings goals, retirement savings, debt payoff </p> <br>
<img src="images/50.png" alt="budget 50/30/20" style="max-width:500px">
</div>

</div>
<div class="nasveti">
<div class="nasveti1">
<h3>70/20/10 principle</h3> 
<p>In this budgeting principle you devide your spending into 3 cathegories:<br><br>
<b>LIVING EXPENSES:</b> Such as:  rent, groceries, utilties, transportation, entertainment and others </p>
<b>SAVINGS & DEBT:</b> Such as: debt payments, emergancy fund, sinking funds, etc. </p>
<b>INVESTMENTS:: </b> Such as: stocks, blockchain, etc. </p>
<img src="images/70.png" alt="budget 70/20/10" style="max-width:500px">
</div>
<div class="nasveti1">
<h3>Other principles you can try out:</h3><br>
One of the popular budgeting principle is also <b>PAY YOURSELF FIRST</b> approach you prioritize saving and investing by allocating a portion of your income to your financial goals before covering other expenses. This ensures that saving is a priority rather than an afterthought.<br>
<br>You can also try <b>REVERSE BUDGETING</b>, where firstly you determine your savings goal first and then allocate the remaining funds to cover your expenses. This approach encourages you to live within your means while working toward your savings goals.     
</div>
</div>

    <div class="uporabnik">
        <p>
        <?php
          // Check if user data is available in the session
          /*if ($user["gender"] == 'F') {
              echo "Hello miss " . $user["name"];
          } else {
              echo "Hello mister " . $user["name"];
          }*/
          ?>
        </p>
    </div>


   

    <script src="baseJS.js">
    </script>
</body>

</html>