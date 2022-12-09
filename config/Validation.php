<?php

class Validation {

    static function val_action($action) {
        if (!isset($action) || $action!=filter_var($action, FILTER_SANITIZE_STRING)) {
            return NULL;
        } else {
            return $action;
        }
    }

    static function val_string(string $string): string {
        if (!isset($string) || $string!=filter_var($string, FILTER_SANITIZE_STRING)) {
            throw new Exception("Invalid string");
            return "";
        } else {
            return $string;
        }
    }
}
?>

        