<?php

class ModelTodoList
{

    public function __construct(){}

    function getAllTDL(string $visibility, int $owner = -1) {
        $gateway = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        if($visibility == 'public'){
            return $gateway->getPublicList();
        }
        if($owner == -1){
            return -1;
        }
        return $gateway->getPrivateList($owner);
    }

    function getConnectedUser(){
        return -1;
    }
}