<?php 

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class  ExpensiveService {

    public function __construct(private Database $db)  {
        
    }


    public function updateExpense(array $formData) {
        $formattedDate = $formData['transaction-date'];

        $this->db->query(
            "UPDATE expenses
            SET 
            expense_category_assigned_to_user_id = :expense_category_assigned_to_user_id,
            amount = :amount,
            date_of_expense = :date_of_expense,
            expense_comment = :expense_comment
            WHERE id = :transaction_id AND user_id = :user_id",
        [
        'user_id' => $_SESSION['user'],
        'expense_category_assigned_to_user_id' => $formData['category'],
        'amount' => $formData['amount'],
        'date_of_expense' => $formattedDate,
        'expense_comment' => $formData['comment'] ?? NULL,
        'transaction_id' => $formData['transaction_id'],  ]);


        return ([
            'status' => 'success',
            'message' => 'Transaction was added successfully'
        ]);
    }
    



    public function create(array $formData) {
        
        
        $formattedDate = $formData['transaction-date'];

        $this->db->query(
            "INSERT INTO expenses (user_id, expense_category_assigned_to_user_id, payment_method_assigned_to_user_id, amount, date_of_expense, expense_comment)
            VALUES (:user_id, :expense_category_assigned_to_user_id, :payment_method_assigned_to_user_id, :amount, :date_of_expense, :expense_comment)",
            [
                'user_id' => $_SESSION['user'],
                'expense_category_assigned_to_user_id' => $formData['selectedId'], 
                'payment_method_assigned_to_user_id' => $formData['payment-methods'], 
                'amount' => $formData['amount'],
                'date_of_expense' => $formattedDate,
                'expense_comment' => $formData['comment'] ?? NULL 
            ]
        );    
        
        
        return ([
            'status' => 'success',
            'message' => 'Transaction was added successfully'
        ]); 
        
    }
     
   
    public function getTransactions($startDate,$finishDate) {

        $transactions = $this->db->query(
            "SELECT 
                expenses.id,
                date_of_expense,
                amount,
                expense_comment,
                expenses_category_assigned_to_users.name AS category_name,
                payment_methods_assigned_to_users.name AS payment_method
            FROM 
                expenses
            JOIN 
                expenses_category_assigned_to_users
            ON 
                expenses_category_assigned_to_users.id = expenses.expense_category_assigned_to_user_id
            JOIN
                payment_methods_assigned_to_users
            ON  
                expenses.payment_method_assigned_to_user_id = payment_methods_assigned_to_users.id 
            WHERE 
                expenses.user_id = :user_id
                AND expenses.date_of_expense BETWEEN :start_date AND :finish_date",
            [
                'user_id' => $_SESSION['user'],
                'start_date' => $startDate,
                'finish_date' => $finishDate
            ]
        )->findAll();
    
        return [
            'status' => 'success',
            'transactions' => $transactions
        ];

  
    }

    public function getCategory() {
        $userCategory = $this->db->query("SELECT * FROM expenses_category_assigned_to_users WHERE user_id = :user_id ",
     ['user_id' => $_SESSION['user']])->findAll();
         
     return $userCategory;
    }

    public function getPaymentMethod() {
        $paymentMethods = $this->db->query("SELECT * FROM payment_methods_assigned_to_users WHERE user_id = :user_id",[
            'user_id' => $_SESSION['user']])->findAll();

        return $paymentMethods;
        
    }

    public function deleteExpense($transaction_id) {   
        
        $this->db->query("DELETE FROM `expenses` WHERE `id` = :id;", ['id' => $transaction_id]);   
    }

    public function getExpense($transaction_id) {
             
        
    
        $transaction = $this->db->query(
            "SELECT 
                expenses.id,
                date_of_expense,
                amount,
                expense_comment,
                payment_method_assigned_to_user_id,
                expense_category_assigned_to_user_id
            FROM 
                expenses
            WHERE 
                expenses.user_id = :user_id
                AND
                expenses.id = :transaction_id",
            [
                'user_id' => $_SESSION['user'],
                'transaction_id' => $transaction_id
            ]
        )->find();
    
        if (!$transaction) {
            return [
                'status' => 'error',
                'message' => 'Transaction not found'
            ];
        }
    
        return $transaction;

    }
    
    


}   

