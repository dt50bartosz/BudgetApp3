<?php 

declare(strict_types=1);

namespace  Framework\Rulers;

use Framework\Contracts\RuleInterface;


class EmailRule implements RuleInterface {

    public function validate(array $date, string $field, array $params): bool
    {
        return (bool) filter_var($date[$field],FILTER_VALIDATE_EMAIL);
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Invalid email";
    }

}