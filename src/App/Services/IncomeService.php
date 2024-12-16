<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class  IncomeService
{

    public function __construct(private Database $db) {}


    public function updateIncome($formData) {
        $formattedDate = $formData['transaction-date'];

        $this->db->query(
            "UPDATE incomes 
                 SET 
        income_category_assigned_to_user_id = :income_category_assigned_to_user_id,
        amount = :amount,
        date_of_income = :date_of_income,
        income_comment = :income_comment
     WHERE id = :transaction_id AND user_id = :user_id",
    [
        'user_id' => $_SESSION['user'],
        'income_category_assigned_to_user_id' => $formData['category'],
        'amount' => $formData['amount'],
        'date_of_income' => $formattedDate,
        'income_comment' => $formData['comment'] ?? NULL,
        'transaction_id' => $formData['transaction_id'],  ]);


        return ([
            'status' => 'success',
            'message' => 'Transaction was added successfully'
        ]);
    }

    
    public function getIncome($transaction_id)
    {
        $transaction = $this->db->query(
            "SELECT 
            id,
            date_of_income,
            amount,
            income_comment,
            income_category_assigned_to_user_id       
        FROM 
            incomes

        WHERE 
            incomes.user_id = :user_id
            AND
            incomes.id = :transaction_id",
        [
            'user_id' => $_SESSION['user'],
            'transaction_id' => $transaction_id
        ]
        )->find();



        return $transaction;
    }

    public function getCategory()
    {
        $userCategory = $this->db->query(
            "SELECT * FROM incomes_category_assigned_to_users WHERE user_id = :user_id ",
            ['user_id' => $_SESSION['user']]
        )->findAll();

        return $userCategory;
    }

    public function getTransactions($startDate, $finishDate)
    {

        $transactions = $this->db->query(
            "SELECT 
                incomes.id,
                incomes.date_of_income,
                incomes.amount,
                income_comment,
                incomes_category_assigned_to_users.name AS category_name
            FROM 
                incomes
            JOIN 
                incomes_category_assigned_to_users
            ON 
                incomes_category_assigned_to_users.id = incomes.income_category_assigned_to_user_id
            WHERE 
                incomes.user_id = :user_id
                AND incomes.date_of_income BETWEEN :start_date AND :finish_date",
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


    public function create(array $formData)
    {

        $formattedDate = $formData['transaction-date'];

        $this->db->query(
            "INSERT INTO incomes (user_id, income_category_assigned_to_user_id,amount, date_of_income, income_comment)
            VALUES (:user_id, :income_category_assigned_to_user_id,:amount, :date_of_income, :income_comment)",
            [
                'user_id' => $_SESSION['user'],
                'income_category_assigned_to_user_id' => $formData['selectedId'],
                'amount' => $formData['amount'],
                'date_of_income' => $formattedDate,
                'income_comment' => $formData['comment'] ?? NULL
            ]
        );


        return ([
            'status' => 'success',
            'message' => 'Transaction was added successfully'
        ]);
    }

    public function deleteIncome($transaction_id)
    {

        $this->db->query("DELETE FROM `incomes` WHERE `id` = :id;", ['id' => $transaction_id]);
    }
}
