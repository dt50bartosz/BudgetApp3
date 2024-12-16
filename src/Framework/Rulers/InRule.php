<?php 


declare(strict_types=1);


namespace Framework\Rulers;

use Framework\Contracts\RuleInterface;

class InRule implements RuleInterface {
    public function validate(array $date, string $field, array $params): bool
    {
        return in_array($date[$field],$params);
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Invalid selection ";
    }
}