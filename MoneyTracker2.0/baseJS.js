

$('#registracijaSubmit').click(function(e){
    e.preventDefault();
    $.ajax({
        url: 'register.php',
        type: 'post',
        data:$('#registracijaForm').serialize(),
        success:function(data){
      if(data.status === "success"){
        console.log(data.message);
        window.location.replace("prijava");
      }
      else{
        console.log(data.message);
      }
    }
    });
});
  $('#prijavaSubmit').click(function(e){
    e.preventDefault();
    $.ajax({
        url: 'login.php',
        type: 'post',
        data:$('#prijavaForm').serialize(),
        success:function(data){
        if(data.status === "success"){
          window.location.replace("index");
        }
        else{
          console.log(data.message);
          window.alert(data.message);
        }
      }
    });
  });
  
  $('#logout').click(function(e){
    $.ajax({
        url: 'logout.php',
        type: 'post',
        data:$('#prijavaForm').serialize(),
        success:function(data){
      }
    });
    
    window.location.replace("prijava");
  });
  $('#registracijaRedirect').click(function(e){
    window.location.replace("Registracija");
  });

  function addRow() {
    let count = $('#budgetTable tbody tr').length;
    count++;
    var table = document.getElementById("budgetTable");
    var newRow = table.insertRow(table.rows.length - 1);
    
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    
    cell1.innerHTML = '<input type="text" name="category-'+count+'" placeholder="New Category" required>';
    cell2.innerHTML = '<input type="number" name="max_limit-'+count+'" required>';
    cell3.innerHTML = '<input type="number" name="avg_expense-'+count+'" placeholder="New Average Expense" required>';
  }

  $('#bugetTableSubmit').click(function(e){
    e.preventDefault(); 
    $.ajax({
        url: 'bugetCategory.php',
        type: 'post',
        data:$('#bugetTableForm').serialize(),
        success:function(data){
        if(data.status === "success"){          
          console.log(data.message);
        }
        else{
          console.log(data.message);
        }
      }
    });
  });


  function generateBugetCard(categoryName, currentAmount, maxAmount, averageExpense) {
    var bugetCard = document.createElement('div');
    bugetCard.className = 'buget-card';
    let usedCash = (currentAmount/maxAmount)*100;
    bugetCard.style = 'background: linear-gradient(to left, #f3c2c2 '+usedCash+'%, #bff1b6 0%);'
    
    bugetCard.setAttribute('data-card-name', categoryName+"_card");
    var cardTitle = document.createElement('div');
    cardTitle.className = 'card-title';
    cardTitle.textContent = categoryName;

    var amountInfo = document.createElement('div');
    amountInfo.textContent = currentAmount + '/' + maxAmount;
    
    amountInfo.setAttribute('data-card-name', categoryName+"_amount");

    var inputContainer = document.createElement('div');
    var addFundsInput = document.createElement('input');
    addFundsInput.setAttribute('input-name', categoryName+"_input");
    addFundsInput.type = 'number';
    addFundsInput.name = 'addFunds';
    addFundsInput.required = true;

    var addButton = document.createElement('button');
    addButton.type = 'button';
    addButton.textContent = 'add';
    addButton.addEventListener('click', function() {
      addToBuget(categoryName, averageExpense);
  });

    var plusButton = document.createElement('button');
    plusButton.type = 'button';
    plusButton.textContent = '+'+averageExpense;
    plusButton.addEventListener('click', function() {
      addToBugetShort(categoryName, averageExpense);
  });

    inputContainer.appendChild(addFundsInput);
    inputContainer.appendChild(addButton);
    inputContainer.appendChild(plusButton);

    bugetCard.appendChild(cardTitle);
    bugetCard.appendChild(amountInfo);
    bugetCard.appendChild(inputContainer);

    return bugetCard;
}

function addToBuget(categoryName){
  let averageExpense = $('[input-name="'+categoryName+'_input"]')[0].value;
  if(isNaN(parseInt(averageExpense))){
    return;
  }
  let items = JSON.parse(localStorage.getItem('bugetCategory'));
  console.log("items", items);
  for (let item of items) {
    if (item.category === categoryName) {
        //console.log("item:",item);
        item.spend = (parseInt(item.spend) + parseInt(averageExpense)).toString();
        //console.log("item:",item);
        break; // No need to continue once category is found
    }
  }
  //localStorage.setItem('bugetCategory', items);
  let value1 = $('div [data-card-name="'+categoryName+'_amount"]')[0].innerHTML.split('/')[0];
  let value2 = $('div [data-card-name="'+categoryName+'_amount"]')[0].innerHTML.split('/')[1];
  //console.log("value1", value1);
  //console.log("value2", value2);
  let result = parseInt(value1) + parseInt(averageExpense);
  //console.log("result", result);
  $('div [data-card-name="'+categoryName+'_amount"]')[0].innerHTML = result.toString()+'/'+value2.toString();
  localStorage.setItem('bugetCategory', JSON.stringify(items));

  
  let cardDiv =  $('div [data-card-name="'+categoryName+'_card"]')[0];
  let usedCash = (result/value2)*100;
  cardDiv.style = 'background: linear-gradient(to left, #f3c2c2 '+usedCash+'%, #bff1b6 0%);';
  saveBugetCategories();
  updateAmount();
}

function addToBugetShort(categoryName, averageExpense){
  let items = JSON.parse(localStorage.getItem('bugetCategory'));
  console.log("items", items);
  for (let item of items) {
    if (item.category === categoryName) {
        //console.log("item:",item);
        item.spend = (parseInt(item.spend) + parseInt(averageExpense)).toString();
        //console.log("item:",item);
        break; // No need to continue once category is found
    }
  }
  //localStorage.setItem('bugetCategory', items);
  let value1 = $('div [data-card-name="'+categoryName+'_amount"]')[0].innerHTML.split('/')[0];
  let value2 = $('div [data-card-name="'+categoryName+'_amount"]')[0].innerHTML.split('/')[1];
  //console.log("value1", value1);
  //console.log("value2", value2);
  let result = parseInt(value1) + parseInt(averageExpense);
  //console.log("result", result);
  $('div [data-card-name="'+categoryName+'_amount"]')[0].innerHTML = result.toString()+'/'+value2.toString();
  localStorage.setItem('bugetCategory', JSON.stringify(items));

  
  let cardDiv =  $('div [data-card-name="'+categoryName+'_card"]')[0];
  let usedCash = (result/value2)*100;
  cardDiv.style = 'background: linear-gradient(to left, #f3c2c2 '+usedCash+'%, #bff1b6 0%);';
  saveBugetCategories();
  updateAmount();
}

function saveBugetCategories(){
  let dataSet = JSON.parse(localStorage.getItem('bugetCategory'));
  $.ajax({
    url: 'updateBugetCategory.php',
    type: 'post',
    data: { dataSet: JSON.stringify(dataSet) }, 
    success:function(data){
    if(data.status === "success"){          
      console.log(data.message);
    }
    else{
      console.log(data.message);
    }
  }
});
}

function generatePieChart() {
  var data = JSON.parse(localStorage.getItem('bugetCategory'));
  const ctx = document.getElementById('pieChart').getContext('2d');
  
  // Extract category names and spend values from data
  const labels = data.map(item => item.category);
  const spendValues = data.map(item => parseInt(item.spend));

  const pieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels,
          datasets: [{
              data: spendValues,
              backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#E91E63', '#2196F3', '#FFC107', '#009688', '#FF5722']
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false
      }
  });
}

function testMailingService(){
  $.ajax({
    url: 'mailing.php',
    type: 'post',
    data: {},
    success:function(data){
    if(data.status === "success"){          
      console.log(data.message);
    }
    else{
      console.log(data.message);
    }
  }
});
}
function updateAmount(){
  let bugetAmount = JSON.parse(localStorage.getItem('bugetAmount'));
  let data= JSON.parse(localStorage.getItem('bugetCategory'));
  let totalSpend = 0;
  for (const item of data) {
      totalSpend += parseInt(item.spend);
  }
  console.log("bugetAmount",bugetAmount);
  console.log("totalSpend",totalSpend);

  result = bugetAmount - totalSpend;
  $('#bugetAmount')[0].innerHTML = result;
   
}