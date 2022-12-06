<?php

class ModelUser{

    public function isUser(){
        if(isset($_SESSION['login'])){
            $login = Validation::val_string($_SESSION['login']);
            return new User($login);
        } else {
            return NULL;
        }
    }

    public function connection(string $log, string $password){
        global $base, $login, $mdp;
        $userGateway = new UserGateway(new Connection($base, $login, $mdp));

        $log = Validation::val_string($login);
        $password = Validation::val_string($password);

        $hashedPassword = $userGateway->getPassword($password);

        if(password_verify($password, $hashedPassword)){
            $_SESSION['role'] = 'user';
            $_SESSION['login'] = $log;
        }
    }
}