<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService,SettingService,Cr};

class SettingController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private SettingService $settingService
        
  ) {}


  public function addExpenseCategory() {

    $category_error = $this->validatorService->validationExpenseCategory($_POST);



    if(!empty($category_error)) {
      echo json_encode(['status' => 'error','errors' => $category_error]);
      exit;
    }else {
      $this->settingService->addExpenseCategory($_POST);
      header('Content-Type: application/json');  
      echo json_encode(['status'=> 'success','message' => "Transaction delete successfully" ]);
    }

  }


  public function addIncomeCategory() 
  { 
   
    $category_error = $this->validatorService->validationIncomeCategory($_POST);

    if(!empty($category_error)) {
      echo json_encode(['status' => 'error','errors' => $category_error]);
    }else {
      $this->settingService->addIncomeCategory($_POST);
      header('Content-Type: application/json');  
      echo json_encode(['status'=> 'success','message' => "Transaction delete successfully" ]);
    }
  }

  public function getView() {

    echo $this->view->render("settings.php");

  }

  public function deleteExpense(array $arr) {
    $transaction_id = $arr["transaction"];
   
     
    $this->settingService->deleteExpenseCategory($transaction_id);
    header('Content-Type: application/json');  
    echo json_encode(['status'=> 'success','message' => "Transaction delete successfully" ]);
  }

  public function deleteIncome(array $arr) {
    
     $transaction_id = $arr["transaction"];   
    $this->settingService->deleteIncomeCategory($transaction_id);
    header('Content-Type: application/json');
  
    echo json_encode(['status'=> 'success','message' => "Transaction delete successfully" ]);

  }






}