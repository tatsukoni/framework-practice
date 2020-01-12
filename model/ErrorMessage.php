<?php

class ErrorMessage
{
    private $errorMessage = [
        'require' => '必須項目です',
        'number' => '数字のみ入力可能です',
        'nullbite' => '不正な文字列が含まれています'
    ];

    public function getErrorMessage(array $errors): array
    {
        foreach ($errors as $key => $rule) {
            $errors[$key] = $this->errorMessage[$rule];
        }

        return $errors;
    }
}
