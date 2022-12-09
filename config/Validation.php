<?php

class Validation {

    static function val_action($action) {
        if (!isset($action) || $action!=filter_var($action, FILTER_SANITIZE_STRING)) {
            return NULL;
        } else {
            return $action;
        }
    }

    static function val_string(string $str): string {
        if (!isset($str) || $str!=filter_var($str, FILTER_SANITIZE_STRING)) {
            throw new Exception("Invalid string");
            return "";
        } else {
            return $str;
        }
    }
}
?>

        