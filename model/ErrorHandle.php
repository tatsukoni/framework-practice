<?php
require_once 'ErrorCheck.php';
require_once 'ErrorMessage.php';
require_once '../form/FormValidate.php';

class ErrorHandle
{
    private $errorCheck;
    private $formValidate;
    private $errors = [];

    public function __construct(
        ?FormValidate $formValidate = null,
        ?ErrorCheck $errorCheck = null,
        ?ErrorMessage $errorMessage = null
    ) {
        $this->errorCheck = $errorCheck ?? new ErrorCheck();
        $this->errorMessage = $errorMessage ?? new ErrorMessage();
        $this->formValidate = $formValidate ?? new FormValidate();
    }

    public function handle(array $postData)
    {
        // バリデーションルールの取得
        $rules = $this->formValidate->rule();

        foreach ($rules as $key => $rule) {
            $this->fail($key, $postData[$key], $rule);
        }

        if ($this->errors == []) {
            return false;
        } else {
            return $this->createErrorMessage($this->errors);
        }
    }

    private function fail(string $key, string $value, string $rule)
    {
        $rules = $this->setValidationRule($rule);

        foreach ($rules as $rule) {
            $method = $this->createMethodName($rule);

            $validateResult = $this->errorCheck->$method($value);

            if (! $validateResult) {
                $this->errors += [
                    $key => $rule
                ];
            }
        }
    }

    private function setValidationRule(string $rule): array
    {
        return explode('|', $rule);
    }

    private function createMethodName(string $rule)
    {
        return 'validate' . ucfirst($rule);
    }

    private function createErrorMessage(array $errors): array
    {
        return $this->errorMessage->getErrorMessage($errors);
    }
}
