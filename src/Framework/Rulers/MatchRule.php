<?php 

declare(strict_types = 1);

namespace Framework\Rulers;

use Framework\Contracts\RuleInterface;

class MatchRule  implements RuleInterface {

    public function validate(array $date, string $field, array $params): bool
    {
        
        $fieldOne = $date[$field];
        $fieldTwo = $date[$params[0]];

        return $fieldOne === $fieldTwo;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Does not match" ;
    }

}