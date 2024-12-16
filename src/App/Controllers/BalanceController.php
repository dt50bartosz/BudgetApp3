<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ExpensiveService, IncomeService};



class BalanceController 
{
    public function __construct(
        private TemplateEngine $view,
        private IncomeService $incomeService,
        private ExpensiveService $expensiveService
    ) {}



  
    public function createView()
    {     
         echo $this->view->render("balance.php");        
    }

    public function getTransactions()
    {
    
        $startDate = $_POST['start-date'];
        $finishDate = $_POST['finish-date'];
        $transactionType = $_POST['transaction'];

        
        $transactionHandlers = [
            'income' => fn() => $this->incomeService->getTransactions($startDate, $finishDate),
            'expense' => fn() => $this->expensiveService->getTransactions($startDate, $finishDate),
        ];

        
        if (!isset($transactionHandlers[$transactionType])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid transaction type. Use "income" or "expense".'
            ]);
            exit;
        }

        $transactions = $transactionHandlers[$transactionType]();
        echo json_encode([
            'status' => 'success',
            'transactions' => $transactions,
        ]);
    }

}


