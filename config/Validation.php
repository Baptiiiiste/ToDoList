<?php

class Validation {

    /**
     * @param $action
     * @return mixed|null
     */
    static function val_action($action) {
        if (!isset($action) || $action!=filter_var($action, FILTER_SANITIZE_STRING)) {
            return NULL;
        } else {
            return $action;
        }
    }

    /**
     * @param string $str
     * @return string
     * @throws Exception
     */
    static function val_string(string $str): string {
        if (!isset($str) || $str == "" || $str!=filter_var($str, FILTER_SANITIZE_STRING) || ctype_space($str)) {
            throw new Exception("Invalid string");
        } else {
            return $str;
        }
    }
}
?>

        