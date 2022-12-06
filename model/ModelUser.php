<?php

class ModelUser
{
    public function isUser(){
        if(isset($_SESSION['login'])){
            $login = Validation::val_string($_SESSION['login']);
            return new User($login);
        } else {
            return NULL;
        }
    }
}