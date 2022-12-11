<?php

class TaskGateway
{
    /**
     * @var
     */
    private $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * @param string $name
     * @param string $description
     * @param string $listTask
     * @return void
     */
    public function insert(string $name, string $description, string $listTask): void
    {
        $query = 'INSERT INTO task (name, description, listTask) VALUES (:name, :description, :listTask)';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':description' => array($description, PDO::PARAM_STR), ':listTask' => array($listTask, PDO::PARAM_STR)));
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = 'DELETE FROM task WHERE id=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
    }

    public function doDone(int $id, bool $done): void
    {
        $query = 'UPDATE task SET done = :done WHERE id=:id';
        $this->con->executeQuery($query, array(':done' => array($done, PDO::PARAM_BOOL),':id' => array($id, PDO::PARAM_INT)));
    }

    /**
     * @param int $id
     * @return Task
     */
    public function getTask(int $id): Task
    {
        $query = 'SELECT id, name, description, done, listtask FROM task WHERE id=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $res = $this->con->getResults();
        return new Task($res[0]['id'], $res[0]['name'], $res[0]['description'], $res[0]['done'], $res[0]['listtask']);
    }
}