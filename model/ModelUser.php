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

    function getConnectedUser(){
        $login = Validation::val_string($_SESSION['login']);
        if ($login == ""){
            throw new Exception("Error login");
        } else {
            return $login;
        }
    }

    public function connection(Connection $con, string $login, string $password){
        $userGateway = new UserGateway($con);

        $login = Validation::val_string($login);
        $password = Validation::val_string($password);

        $hashedPassword = $userGateway->getPassword($login);

        if(password_verify($password, $hashedPassword)){
            $_SESSION['role'] = 'user';
            $_SESSION['login'] = $login;
        }
    }
}