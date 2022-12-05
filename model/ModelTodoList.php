<?php

class ModelTodoList
{

    public function __construct(){}

    function getAllTDL(Connection $con, string $visibility, int $owner = -1) {
        $gateway = new ListTaskGateway($con);
        if($visibility == 'public'){
            return $gateway->getPublicList();
        }
        if($owner == -1){
            return -1;
        }
        return $gateway->getPrivateList($owner);
    }

    function getConnectedUser(Connection $con){
        return -1;
    }

    function addTDL(Connection $con, string $name, int $owner, bool $visibility){
        $gateway = new ListTaskGateway($con);
        $gateway->insert($name, $owner, $visibility);
    }

    function addTask(Connection $con, string $name, string $description, int $listTask){
        $gateway = new TaskGateway($con);
        $gateway->insert($name, $description, $listTask);
    }

    function deleteTDL(Connection $con, int $id){
        $gateway = new ListTaskGateway($con);
        $gateway->delete($id);
    }

    function deleteTask(Connection $con, int $id){
        $gateway = new TaskGateway($con);
        $gateway->delete($id);
    }
}