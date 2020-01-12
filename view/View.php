<?php
require_once '../session/Session.php';

class View
{
    private $session;
    private $errors;

    public function __construct(?Session $session)
    {
        $this->session = $session ?? new Session();
        $this->errors = $this->getErrors();
    }

    private function setErrors()
    {
        if (! empty($_SESSION['flash']['validate'])) {
            $this->errors = $_SESSION['flash']['validate'];
        } else {
            $this->errors = [];
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}