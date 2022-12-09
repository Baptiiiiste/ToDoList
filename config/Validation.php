<?php

class Validation {

    static function val_action($action) {
        if (!isset($action)) {
            return NULL;
        } else {
            return self::val_string($action);
        }
    }

    static function val_string(string $string) {
        if (!isset($string) || $string=="" || ctype_space($string)) {
            throw new Exception("Invalid string");
            return "";
        } else {
            return $string;
        }
    }

    static function val_form(string &$login, string &$password, &$dVueEreur) {
        $login = self::val_string($login);
        if ($login == null) {
            $dVueEreur[] =	"No login";
            $login="";
        }

        if ($login != filter_var($login, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"Code inject";
            $login="";
        }

        $password = self::val_string($password);
        if ($password == null || $password != filter_var($password, FILTER_SANITIZE_STRING)) {
            $dVueEreur[] =	"No password ";
            $password="";
        }
    }

}
?>

        