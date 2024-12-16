<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, IncomeService};

class IncomeController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private IncomeService $transactionService
  ) {}



  public function editIncome() {

    $errors = $this->validatorService->validateTransaction($_POST); 

   
    

    if (!empty($errors)) {
      $data = [
        'status' => 'error',
        'errors' => $errors
      ];

      echo json_encode($data);
      exit;
    } else {
      $this->transactionService->updateIncome($_POST);
      $data = [
        'status' => 'success',
        'message' => 'Income added successfully'
      ];
      echo json_encode($data);
    }
     
  
  }

  public function getCategories() {

    $categories = $this->transactionService->getCategory();

    $data = [
      "status" => "success",
      "categories" => $categories
    ];  
    header('Content-Type: application/json');
  
 
    echo json_encode($data);

  }

 public function getIncome() {
    $transactionId = $_GET['id'];;
    $income =  $this->transactionService->getIncome($transactionId);
    $data = [
      "status" => "success",
      "transaction" => $income
    ];  
   header('Content-Type: application/json');
  
 
    echo json_encode($data);
   
 }

  public function deleteIncome($arr) {   
  
    $transaction_id = $arr["transaction"];
  
    $this->transactionService->deleteIncome($transaction_id);
    header('Content-Type: application/json');
  
    echo json_encode(['status'=> 'success','message' => "Transaction delete successfully" ]);
    
  }

  public function createView()
  {
    $categories = $this->transactionService->getCategory();

    echo $this->view->render("transactions\addIncome.php", ['categories' => $categories]);
  }

  public function addIncome()
  {
    $errors = $this->validatorService->validateTransaction($_POST);    

    if (!empty($errors)) {
      $data = [
        'status' => 'error',
        'errors' => $errors
      ];

      echo json_encode($data);
      exit;
    } else {
      $this->transactionService->create($_POST);
      $data = [
        'status' => 'success',
        'message' => 'Income added successfully'
      ];
      echo json_encode($data);
    }
  }



}
