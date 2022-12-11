<?php

class Validation {

    /**
     * @param $action
     * @return string|null
     */
    static function val_action($action): ?string
    {
        if (!isset($action) || $action!=filter_var($action, FILTER_SANITIZE_STRING)) {
            return NULL;
        } else {
            return $action;
        }
    }


    /**
     * @param $page
     * @param int $nbPages
     * @return int
     */
    static function val_page($page, int $nbPages): int
    {
        if (!isset($page) || $page == "" || $page!=filter_var($page, FILTER_SANITIZE_STRING)) {
            return 1;
        } else {
            $page = abs(intval($page));
            if($page == 0 || $page > $nbPages){
                return 1;
            }
            return $page;
        }
    }

    /**
     * @param string $str
     * @return string
     * @throws Exception
     */
    static function val_string(string $str): string
    {
        if (!isset($str) || $str == "" || $str!=filter_var($str, FILTER_SANITIZE_STRING) || ctype_space($str)) {
            throw new Exception("Invalid string");
        } else {
            return $str;
        }
    }
}
?>

        