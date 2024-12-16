<?php 

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\ValidationException;

class Validator {
    
    private array $rules = [];

    public function add(string $alias, RuleInterface $rule) {

        $this->rules[$alias] = $rule;

    }

    public function validate(array $formDate,array $fields) {     

        $errors = [];

        foreach ($fields as $fieldName => $rules) {

            foreach($rules as $rule) {
                $ruleParams = [];

                if (str_contains($rule, ':')) {
                    [$rule, $ruleParams] = explode(':', $rule);
                    $ruleParams = explode(',', $ruleParams);
                   
                }
    


                $ruleValidator = $this->rules[$rule]; 
              
                if($ruleValidator->validate($formDate,$fieldName,$ruleParams)) {
                    continue;
                }

                $errors[$fieldName][] = $ruleValidator->getMessage($formDate,
                $fieldName,$ruleParams);
            }
        }

        if(count($errors)) {
            throw new ValidationException($errors);
        }
        

    }

    public function validateAjax(array $formData, array $fields): array {
        $errors = [];
    
        foreach ($fields as $fieldName => $rules) {
            foreach ($rules as $rule) {
                $ruleParams = [];
    
                if (str_contains($rule, ':')) {
                    [$rule, $ruleParams] = explode(':', $rule);
                    $ruleParams = explode(',', $ruleParams);
                }
    
                $ruleValidator = $this->rules[$rule];
    
                if ($ruleValidator->validate($formData, $fieldName, $ruleParams)) {
                    continue;
                }
    
                $errors[$fieldName][] = $ruleValidator->getMessage(
                    $formData,
                    $fieldName,
                    $ruleParams
                );
            }
        }
    
        return $errors;
    }
    
}