<?php

class ModelTodoList
{

    public function __construct(){}

    function getAllTDL(Connection $con, string $visibility, string $owner = "") {
        $gateway = new ListTaskGateway($con);

        if($visibility == 'public'){
            return $gateway->getPublicList();
        }
        if($owner == ""){
            return -1;
        }
        return $gateway->getPrivateList($owner);
    }

    function getConnectedUser(Connection $con){
        return -1;
    }

    function addTDL(Connection $con, string $name, string $owner, bool $visibility){
        $gateway = new ListTaskGateway($con);
        $gateway->insert($name, $owner, $visibility);
    }

    function addTask(Connection $con, string $name, string $description, string $listTask){
        $gateway = new TaskGateway($con);
        $gateway->insert($name, $description, $listTask);
    }

    function deleteTDL(Connection $con, string $name){
        $gateway = new ListTaskGateway($con);
        $gateway->delete($name);
    }

    function deleteTask(Connection $con, string $name){
        $gateway = new TaskGateway($con);
        $gateway->delete($name);
    }
}