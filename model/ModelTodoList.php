<?php

class ModelTodoList
{

    public function __construct(){}

    function getAllTDL(Connection $con, string $visibility, string $owner = "") {
        $gateway = new ListTaskGateway($con);

        if($visibility == 'public'){
            return $gateway->getPublicList();
        }
        return $gateway->getPrivateList($owner);
    }

    function getConnectedUser(Connection $con){
        return -1;
    }

    function addTDL(Connection $con, string $name, bool $visibility, string $owner = ""){
        try{
            $gateway = new ListTaskGateway($con);
            $gateway->insert($name, $owner, $visibility);
        } catch (PDOException $e) {
            throw new Exception("list already exist");
        }

    }

    function addTask(Connection $con, string $name, string $description, string $listTask){
        try {
            $gateway = new TaskGateway($con);
            $gateway->insert($name, $description, $listTask);
        } catch (PDOException $e) {
            throw new Exception("task already exist");
        }
    }

    function deleteTDL(Connection $con, string $name){
        try {
            $gateway = new ListTaskGateway($con);
            $gateway->delete($name);
        } catch (PDOException $e) {
            throw new Exception("list doesn't exist");
        }
    }

    function deleteTask(Connection $con, string $name){
        try {
            $gateway = new TaskGateway($con);
            $gateway->delete($name);
        } catch (PDOException $e) {
            throw new Exception("task doesn't exist");
        }
    }
}