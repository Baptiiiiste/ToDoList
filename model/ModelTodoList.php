<?php

class ModelTodoList
{

    /**
     *
     */
    public function __construct(){}

    /**
     * @param Connection $con
     * @param int $page
     * @param int $nbTodoList_par_page
     * @param bool $visibility
     * @param $owner
     * @return array
     */
    function getAllTDL(Connection $con, int $page, int $nbTodoList_par_page, bool $visibility, $owner = null): array
    {
        $gateway = new ListTaskGateway($con);
        return $gateway->getList($visibility, $page, $nbTodoList_par_page, $owner);
    }

    function getNbTDL(Connection $con, bool $visibility): int
    {
        $gateway = new ListTaskGateway($con);
        return $gateway->getNbTDL($visibility);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @param bool $visibility
     * @param $owner
     * @return void
     * @throws Exception
     */
    function addTDL(Connection $con, string $name, bool $visibility, $owner = null): void
    {
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
    function addTask(Connection $con, string $name, string $description, string $listTask): void
    {
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
     * @param $owner
     * @return void
     * @throws Exception
     */
    function deleteTDL(Connection $con, int $id, $owner = null): void
    {
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
    function deleteTask(Connection $con, int $id): void
    {
        try {
            $gateway = new TaskGateway($con);
            $gateway->delete($id);
        } catch (PDOException $e) {
            throw new Exception("Task doesn't exists");
        }
    }

    /**
     * @param Connection $con
     * @param int $id
     * @return void
     * @throws Exception
     */
    function doTask(Connection $con, int $id): void
    {
        try {
            $gateway = new TaskGateway($con);
            $task = $gateway->getTask($id);

            if($task->isDone()){
                $gateway->doDone($id, false);
            } else {
                $gateway->doDone($id, true);
            }
        } catch (PDOException $e) {
            throw new Exception("Task doesn't exists");
        }
    }

}