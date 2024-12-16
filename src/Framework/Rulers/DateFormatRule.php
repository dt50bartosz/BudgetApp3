<?php

namespace Framework\Rulers;



use Framework\Contracts\RuleInterface;

class DateFormatRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
       
        if (!isset($params[0])) {
            return false; 
        }

        
        $parseDate = date_parse_from_format($params[0], $data[$field]);

     
        return $parseDate['error_count'] === 0 && $parseDate['warning_count'] === 0;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "The $field must be a valid date in the format {$params[0]}.";
    }
}
