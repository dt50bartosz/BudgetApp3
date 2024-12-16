<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, ExpensiveService };

class ExpensiveController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private ExpensiveService $transactionService
  ) {
  }


  public function editExpense() {
    $errors = $this->validatorService->validateExpenses($_POST);   
    

    if (!empty($errors)) {
      $data = [
        'status' => 'error',
        'errors' => $errors
      ];

      echo json_encode($data);
      exit;
    } else {
      $this->transactionService->updateExpense($_POST);
      header('Content-Type: application/json');

      echo json_encode(['status'=> 'success','message' => "Transaction updated successfully" ]);
    }
     
  
  }

  public function getExpenseCategories() {
     $categories = $this->transactionService->getCategory();

     $data = ['status' => 'success', 'categories' => $categories];
     header('Content-Type: application/json');
     echo json_encode($data);
     
  }

  public function getPaymentMethod() {
    $paymentMethods = $this->transactionService->getPaymentMethod();

     $data = ['status' => 'success', 'payment' => $paymentMethods];
     header('Content-Type: application/json');
     echo json_encode($data);
  }



  public function getExpense() {
    $transaction_id = $_GET['id'];
    
    $expense = $this->transactionService->getExpense($transaction_id);
    header('Content-Type: application/json');
    $data = ['status' => 'success', 'transaction' => $expense];

    echo json_encode($data);
  }


  public function createView()
  {
    $categories = $this->transactionService->getCategory();
    $paymentMethods = $this->transactionService->getPaymentMethod();

    echo $this->view->render("transactions\addExpensive.php",['categories' => $categories,'paymentMethods'=>$paymentMethods]);
 
  }


  
  public function addExpensive() {  
        
   $errors = $this->validatorService->validateExpenses($_POST);

   

  
   
   if(!empty($errors)) {
      $data = [
      'status' => 'error',
      'errors' => $errors];
    
      echo json_encode($data);
      exit;
    } else {
      $this->transactionService->create($_POST);
      $data = ['status' => 'success',
      'message' => 'Expense added successfully'];
      echo json_encode($data);
    }   
  }

  public function deleteExpense($arr) {

   
  
    $transaction_id = $arr["transaction"];

    $this->transactionService->deleteExpense($transaction_id);
    header('Content-Type: application/json');

    echo json_encode(['status'=> 'success','message' => "Transaction delete successfully" ]);
 
    
  }
}
