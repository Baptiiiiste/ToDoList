<?php

class TaskGateway
{
    private $con;
    public function __construct(Connection $con) {
        $this->con = $con;
    }

    public function insert(string $name, string $description, int $listTask) {
        $query = 'INSERT INTO Task (name, description, listTask) VALUES (:name, :description, :listTask)';
        try {
            $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':description' => array($description, PDO::PARAM_STR), ':listTask' => array($listTask, PDO::PARAM_INT)));
        } catch (PDOException $e){
            echo '<script type="text/javascript">';
            echo ' alert("This task already exist")';
            echo '</script>';
        }
    }

    public function delete(int $id){
        $query = 'DELETE FROM Task WHERE id=:id';
        $this->con->executeQuery($query, array(':id' => array(id, PDO::PARAM_INT)));
    }
}