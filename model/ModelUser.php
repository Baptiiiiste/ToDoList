<?php

class ModelUser{

    /**
     * @return User|null
     * @throws Exception
     */
    public function isUser(): ?User
    {
        if(isset($_SESSION['login'])){
            $login = Validation::val_string($_SESSION['login']);
            return new User($login);
        } else {
            return NULL;
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    function getConnectedUser(): string
    {
        $login = Validation::val_string($_SESSION['login']);
        if ($login == ""){
            throw new Exception("Error login");
        } else {
            return $login;
        }
    }

    /**
     * @param Connection $con
     * @param string $login
     * @param string $password
     * @return void
     * @throws Exception
     */
    public function connection(Connection $con, string $login, string $password): void
    {
        $userGateway = new UserGateway($con);

        $login = Validation::val_string($login);
        $password = Validation::val_string($password);

        $hashedPassword = $userGateway->getPassword($login);

        if(password_verify($password, $hashedPassword)){
            $_SESSION['role'] = 'user';
            $_SESSION['login'] = $login;
        }
    }


    /**
     * @param Connection $con
     * @param string $login
     * @param string $password
     * @return void
     * @throws Exception
     */
    public function createUser(Connection $con, string $login, string $password): bool
    {
        global $rep, $vues;
        $userGateway = new UserGateway($con);

        $login = Validation::val_string($login);
        $password = Validation::val_string($password);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try{
            $userGateway->insert($login, $hashedPassword);
        }catch (Exception $e){
            $TabVueEreur[] = "This pseudo is already taken";
            require($rep.$vues['erreur']);
            return false;
        }
        return true;
    }


}

