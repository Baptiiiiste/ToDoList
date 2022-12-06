<?php

class UserGateway
{

    private $con;

    public function __construct(Connection $con) {
        $this->con = $con;
    }
    public function insert(string $pseudo, string $email, string $password) {
        $query = 'INSERT INTO User (pseudo, email, password) VALUES (:pseudo, :email, :password)';
        $this->con->executeQuery($query, array(':pseudo' => array($pseudo, PDO::PARAM_STR), ':email' => array($email, PDO::PARAM_STR), ':password' => array($password,  PDO::PARAM_STR)));
    }

    public function getPassword(string $login){
        $login = Validation::val_string($login);
        $query = "SELECT password FROM User WHERE login=:login";
        $this->con->executeQuery($query, array(":login" => array($login, PDO::PARAM_STR)));
        $res = $this->con->getResults();
        return $res;
    }

}