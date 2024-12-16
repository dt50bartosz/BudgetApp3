<?php 

declare(strict_types=1);


namespace App\Services;


namespace App\Services;

use Framework\Validator;
use Framework\Rulers\{RequiredRule, EmailRule, MinRule, InRule, UrlRule, MatchRule, NumericRule, LengthMaxRule, DateFormatRule};

class ValidatorService {
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->add("required", new RequiredRule);
        $this->validator->add('email', new EmailRule());
        $this->validator->add('min', new MinRule());
        $this->validator->add('in', new InRule());
        $this->validator->add('match', new MatchRule());
        $this->validator->add('numeric', new NumericRule());
        $this->validator->add('lengthMax', new LengthMaxRule());

        $this->validator->add('dateRule', new DateFormatRule());
    }

    public function validateRegister(array $formData) {
        $this->validator->validate($formData, [
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3'],
            'confirmPassword' => ['required', 'match:password'],
        ]);
    }

    public function validateLogin(array $formData) {
        $this->validator->validate($formData, [
            'username' => ['required'],
            'password' => ['required'],
        ]);
    }

    public function validateTransaction(array $formData): array {
        $errors = [];

        $errors = $this->validator->validateAjax($formData, [
            'comment' => ['lengthMax:255'],
            'amount' => ['required', 'numeric'],
            'transaction-date' => ['required', 'dateRule:Y-m-d'] 
        ]);

        return $errors;
    }

    public function validateExpenses(array $formData) : array {
        $errors = [];

        $errors = $this->validator->validateAjax($formData, [
            'comment' => ['lengthMax:255'],
            'amount' => ['required', 'numeric'],
            'transaction-date' => ['required', 'dateRule:Y-m-d'],
            'payment-methods' => ['required']
        ]);

        return $errors;

    }

    public function validationIncomeCategory(array $formData) {
        $errors = [];

        $errors = $this->validator->validateAjax($formData, [
            'addIncomeName' => ['required','lengthMax:125']

        ]);

        return $errors;
    }


    public function validationExpenseCategory(array $formData) {
        $errors = [];

        $errors = $this->validator->validateAjax($formData, [
            'addExpenseName' => ['required','lengthMax:125']

        ]);

        return $errors;
    }

    
}

