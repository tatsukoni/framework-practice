<?php

class Session
{
    public function __construct()
    {
        $this->sessionStart();
    }

    public function sessionStart()
    {
        return session_start();
    }

    public function sessionUnset()
    {
        return session_unset();
    }

    public function setSession(string $key, array $data)
    {
        $_SESSION[$key] = $data;
    }

    public function setFlash(string $key, array $data)
    {
        $_SESSION['flash'][$key] = $data;

        if (! isset($_SESSION['flash']['count'])) {
            $_SESSION['flash']['count'] = 0;
        }
    }

    public function deleteFlash()
    {
        if (empty($_SESSION['flash'])) {
            return;
        }

        if ($_SESSION['flash']['count'] > 0) {
            unset($_SESSION['flash']);
            return;
        }

        $_SESSION['flash']['count']++;
    }
}
