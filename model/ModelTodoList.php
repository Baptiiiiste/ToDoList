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

    function addPublicTDL(string $name, int $owner){
        $gateway = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        $gateway->insert($name, $owner);
    }

    function addPrivateTDL(string $name, int $owner, bool $visibility){
        $gateway = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        $gateway->insert($name, $owner, $visibility);
    }

    function addTask(string $name, string $description, int $listTask){
        $gateway = new TaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        $gateway->insert($name, $description, $listTask);
    }

    function deleteTDL(int $id){
        $gateway = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        $gateway->delete($id);
    }

    function deleteTask(int $id){
        $gateway = new TaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        $gateway->delete($id);
    }
}