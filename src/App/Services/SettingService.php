<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class  SettingService
{

    public function __construct(private Database $db) {}


    public function deleteExpenseCategory($categoryId) {

        
        $this->db->query("DELETE FROM expenses_category_assigned_to_users WHERE id = :id; AND user_id = :user_id ", 
        ['id' => $categoryId,'user_id' => $_SESSION['user']]);


    }


    public function deleteIncomeCategory($categoryId) {

        
        $this->db->query("DELETE FROM incomes_category_assigned_to_users WHERE id = :id; AND user_id = :user_id ", 
        ['id' => $categoryId,'user_id' => $_SESSION['user']]);
    }


    public function addIncomeCategory($category) {

        $this->db->query(
                "INSERT INTO incomes_category_assigned_to_users ( user_id, name, icon) 
                 VALUES ( :user_id, :name, :icon)",                 [
                
                    'user_id' => $_SESSION['user'], 
                    'name' => $category['addIncomeName'], 
                    'icon' => $category['addIncomeCategory']
                ]
        );          
    }


    public function addExpenseCategory($category) {
        $this->db->query(
            "INSERT INTO expenses_category_assigned_to_users ( user_id, name, icon) 
             VALUES ( :user_id, :name, :icon)",                 [
            
                'user_id' => $_SESSION['user'], 
                'name' => $category['addExpenseName'], 
                'icon' => $category['addExpenseCategory']
            ]
    );  
    }
}