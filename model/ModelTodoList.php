<?php

class ModelTodoList
{
    /**
     * @var ListTaskGateway
     */
    private ListTaskGateway $gateway;

    public function __construct(Connection $con){
        $this->gateway = new ListTaskGateway($con);
    }

    /**
     * @param int $page
     * @param int $nbTodoList_par_page
     * @param bool $visibility
     * @param null $owner
     * @return array
     */
    function getAllTDL(int $page, int $nbTodoList_par_page, bool $visibility, $owner = null): array
    {
        return $this->gateway->getList($visibility, $page, $nbTodoList_par_page, $owner);
    }

    /**
     * @param bool $visibility
     * @return int
     */
    function getNbTDL(bool $visibility): int
    {
        return $this->gateway->getNbTDL($visibility);
    }

    /**
     * @param string $name
     * @param bool $visibility
     * @param null $owner
     * @return void
     * @throws Exception
     */
    function addTDL(string $name, bool $visibility, $owner = null): void
    {
        try{
            $this->gateway->insert($name, $owner, $visibility);
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
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @param null $owner
     * @return void
     * @throws Exception
     */
    function deleteTDL(int $id, $owner = null): void
    {
        try {
            $this->gateway->delete($id, $owner);
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