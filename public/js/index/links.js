/*
$(".add-income-link").click(function(event) {  
   window.location.href = "https://budget.bartosz-jankowski.profesjonalnyprogramista.pl/addIncome.php";  
});

$(".add-expense-link").click(function(event) {  
    window.location.href = "https://budget.bartosz-jankowski.profesjonalnyprogramista.pl/addExpense.php";  
});

$(".balance-link").click(function(event) {
    window.location.href = "https://budget.bartosz-jankowski.profesjonalnyprogramista.pl/balance.php";  
});


$(".main-menu-link").click(function(event) {   
    window.location.href = "/addIncome";  
});*/
//


$(".main-menu-link, .add-income-link, .add-expense-link, .balance-link, .setting-link").click(function(event) {  

    const urlMap = {
        '.add-income-link': 'http://localhost/addIncome',
        '.add-expense-link': 'http://localhost/addExpenses',  
        '.balance-link': 'http://localhost/balance',
        '.main-menu-link': 'http://localhost/index',
        '.setting-link': 'http://localhost/settings'
    };

    const linkClass = '.' + $(this).attr('class').split(' ')[0]; 
    window.location.href = urlMap[linkClass];
});

