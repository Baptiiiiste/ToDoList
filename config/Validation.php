<?php

class Validation {

    static function val_action($action) {
        if (!isset($action)) {
            throw new Exception("error action");
            return NULL;
        } else {
            return $action;
        }
    }

    static function val_string(string $string) {
        if (!isset($string) || $string=="") {
            throw new Exception("error string");
        } else {
            return $string;
        }
    }

    static function val_form(string &$login, string &$password, &$dVueEreur) {
        $login = self::val_string($login);
        if ($login == null) {
            $dVueEreur[] =	"no login";
            $login="";
        }

        if ($login != filter_var($login, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"code inject";
            $login="";
        }

        $password = self::val_string($password);
        if ($password == null || $password != filter_var($password, FILTER_SANITIZE_STRING)) {
            $dVueEreur[] =	"no password ";
            $password="";
        }
    }

}
?>

        