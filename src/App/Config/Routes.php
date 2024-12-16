<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController,AuthController,ExpensiveController,
    IncomeController,BalanceController,SettingController};

                    
use App\Middleware\{AuthRequiredMiddleware,GuestOnlyMiddleware,CsrfTokenMiddleware};



function registerRoutes(App $app) {

    $app->get('/', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
    $app->get('/register', [AuthController::class, 'newUserView'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);

    $app->get('/index', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);

    $app->get('/addExpenses',[ExpensiveController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->get('/paymentMethods',[ExpensiveController::class, 'getPaymentMethod'])->add(AuthRequiredMiddleware::class);
    $app->get('/getExpense',[ExpensiveController::class, 'getExpense'])->add(AuthRequiredMiddleware::class);
    $app->post('/addExpense',[ExpensiveController::class, 'addExpensive'])->add(AuthRequiredMiddleware::class);
    $app->get('/getExpenseCategories',[ExpensiveController::class, 'getExpenseCategories'])->add(AuthRequiredMiddleware::class);
    $app->delete('/deleteExpense/{transaction}',[ExpensiveController::class, 'deleteExpense']);
    $app->post('/editExpense',[ExpensiveController::class, 'editExpense']);

    
    $app->get('/addIncome',[IncomeController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->post('/addIncome',[IncomeController::class, 'addIncome'])->add(AuthRequiredMiddleware::class); 
    $app->get('/getIncome',[IncomeController::class, 'getIncome'])->add(AuthRequiredMiddleware::class);
    $app->get('/incomeCategories',[IncomeController::class, 'getCategories'])->add(AuthRequiredMiddleware::class);
    $app->delete('/deleteIncome/{transaction}',[IncomeController::class, 'deleteIncome']);
    $app->post('/editIncome',[IncomeController::class, 'editIncome']);

    $app->get('/balance',[BalanceController::class, 'createView'])->add(AuthRequiredMiddleware::class); 
    $app->post('/balance',[BalanceController::class, 'getTransactions'])->add(AuthRequiredMiddleware::class);



   $app->get('/settings',[SettingController::class,'getView'])->add(AuthRequiredMiddleware::class);   
   $app->delete('/deleteExpenseCategory/{transaction}',[SettingController::class,'deleteExpense'])->add(AuthRequiredMiddleware::class);
   $app->delete('/deleteIncomeCategory/{transaction}',[SettingController::class,'deleteIncome'])->add(AuthRequiredMiddleware::class);
   $app->post('/addIncomeCategory',[SettingController::class,'addIncomeCategory'])->add(AuthRequiredMiddleware::class);
   $app->post('/addExpenseCategory',[SettingController::class,'addExpenseCategory'])->add(AuthRequiredMiddleware::class);  

   
        
   


    
};