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
    public function insert(string $name, string $description, string $listTask) {
        $query = 'INSERT INTO task (name, description, listTask) VALUES (:name, :description, :listTask)';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':description' => array($description, PDO::PARAM_STR), ':listTask' => array($listTask, PDO::PARAM_STR)));
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id){
        $query = 'DELETE FROM task WHERE id=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
    }

//    /**
//     * @param int $id
//     * @return void
//     */
//    public function getTask(int $id){
//        $query = 'SELECT * FROM task WHERE id=:id';
//        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
//        $res = $this->con->getResults();
//        $task = new Task($res['id'], $res['name'], $res['description'], $res['done'], $res['idList']);
//        return $task;
//    }
}