<?php 

declare(strict_types=1);


namespace Framework\Rulers;

use Framework\Contracts\RuleInterface;

class RequiredRule implements RuleInterface {

    public function validate(array $date, string $field, array $params) : bool {
               
        return !empty($date[$field]);
    }

    public function getMessage(array $data, string $field, array $params): string
    {       
        return "This field is required";
        
    }
}