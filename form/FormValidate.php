<?php
require_once 'Validate.php';

class FormValidate implements Validate
{
    public function rule(): array
    {
        return
        [
            'text' => 'require',
            'number' => 'require|number'
        ];
    }
}
