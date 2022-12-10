<?php

class ModelTodoList
{

    /**
     *
     */
    public function __construct(){}

    /**
     * @param Connection $con
     * @param string $visibility
     * @param string $owner
     * @return array
     */
    function getAllTDL(Connection $con, string $visibility, string $owner = ""): array {
        $gateway = new ListTaskGateway($con);

        if($visibility == 'public'){
            return $gateway->getPublicList();
        }
        return $gateway->getPrivateList($owner);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @param bool $visibility
     * @param string $owner
     * @return void
     * @throws Exception
     */
    function addTDL(Connection $con, string $name, bool $visibility, string $owner = ""){
        try{
            $gateway = new ListTaskGateway($con);
            $gateway->insert($name, $owner, $visibility);
        } catch (PDOException $e) {
            throw new Exception("List already exists");
        }

    }

    /**
     * @param Connection $con
     * @param string $name
     * @param string $description
     * @param string $listTask
     * @return void
     * @throws Exception
     */
    function addTask(Connection $con, string $name, string $description, string $listTask){
        try {
            $gateway = new TaskGateway($con);
            $gateway->insert($name, $description, $listTask);
        } catch (PDOException $e) {
            throw new Exception("Task already exists");
        }
    }

    /**
     * @param Connection $con
     * @param int $id
     * @return void
     * @throws Exception
     */
    function deleteTDL(Connection $con, int $id, string $owner = ""){
        try {
            $gateway = new ListTaskGateway($con);
            $gateway->delete($id, $owner);
        } catch (PDOException $e) {
            throw new Exception("List doesn't exists");
        }
    }

    /**
     * @param Connection $con
     * @param int $id
     * @return void
     * @throws Exception
     */
    function deleteTask(Connection $con, int $id){
        try {
            $gateway = new TaskGateway($con);
            $gateway->delete($id);
        } catch (PDOException $e) {
            throw new Exception("Task doesn't exists");
        }
    }
}