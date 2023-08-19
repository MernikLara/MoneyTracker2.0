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