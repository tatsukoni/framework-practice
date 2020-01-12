<?php

class ErrorCheck
{
    /*
    * 必須確認
    */
    public function validateRequire($value)
    {

        $targetBlank = [' ', '　'];
        if (in_array((mb_substr($value, 0, 1)), $targetBlank)) {
            return false;
        }

        if (empty($value)) {
            return false;
        }

        return true;
    }

    /*
    * 数値判定
    */
    public function validateNumber($value)
    {
        if (! is_numeric($value)) {
            return false;
        }

        return true;
    }

    /*
    * nullバイト判定
    */
    public function validateNullbite($value)
    {
        $checkNullBite = preg_match('/\0/', $value);
        if ($checkNullBite === false) {
            return false;
        }

        if ($checkNullBite === 1) {
            return false;
        }

        return true;
    }
}
