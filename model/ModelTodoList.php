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

    function addTDL(Connection $con, string $name, bool $visibility, string $owner = ""){
        try{
            $gateway = new ListTaskGateway($con);
            $gateway->insert($name, $owner, $visibility);
        } catch (PDOException $e) {
            throw new Exception("List already exists");
        }

    }

    function addTask(Connection $con, string $name, string $description, string $listTask){
        try {
            $gateway = new TaskGateway($con);
            $gateway->insert($name, $description, $listTask);
        } catch (PDOException $e) {
            throw new Exception("Task already exists");
        }
    }

    function deleteTDL(Connection $con, string $name){
        try {
            $gateway = new ListTaskGateway($con);
            $gateway->delete($name);
        } catch (PDOException $e) {
            throw new Exception("List doesn't exists");
        }
    }

    function deleteTask(Connection $con, int $id){
        try {
            $gateway = new TaskGateway($con);
            $gateway->delete($id);
        } catch (PDOException $e) {
            throw new Exception("Task doesn't exists");
        }
    }
}