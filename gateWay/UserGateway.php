<?php

class UserGateway
{

    private $con;

    public function __construct(Connection $con) {
        $this->con = $con;
    }
    public function insert(string $login, string $password) {
        $query = 'INSERT INTO User (login, password) VALUES (:login, :email, :password)';
        $this->con->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR), ':password' => array($password,  PDO::PARAM_STR)));
    }

    public function getPassword(string $login){
        $login = Validation::val_string($login);

        // Surement d'abord vérifier si "SELECT login" existe ?

        $query = "SELECT password FROM User WHERE login=:login";
        $this->con->executeQuery($query, array(":login" => array($login, PDO::PARAM_STR)));
        $res = $this->con->getResults()[0]['password'];
        return $res;
    }

}