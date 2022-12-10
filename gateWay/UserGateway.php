<?php

class UserGateway
{
    /**
     * @var Connection
     */
    private $con;

    /**
     * @param Connection $con
     */
    public function __construct(Connection $con) {
        $this->con = $con;
    }

    /**
     * @param string $login
     * @param string $password
     * @return void
     */
    public function insert(string $login, string $password) {
        $query = 'INSERT INTO user (login, password) VALUES (:login, :password)';
        $this->con->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR), ':password' => array($password,  PDO::PARAM_STR)));
    }

    /**
     * @param string $login
     * @return mixed
     * @throws Exception
     */
    public function getPassword(string $login){
        $login = Validation::val_string($login);
        $query = "SELECT password FROM user WHERE login=:login";
        $this->con->executeQuery($query, array(":login" => array($login, PDO::PARAM_STR)));
        $res = $this->con->getResults()[0]['password'];
        return $res;
    }
}