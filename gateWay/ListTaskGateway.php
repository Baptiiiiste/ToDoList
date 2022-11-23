<?php

class ListTaskGateway
{
    private $con;
    public function __construct(Connection	$con) {
        $this->con = $con;
    }

    public function insert(string $name, int $owner, bool $visibility = false) {
        $query = 'INSERT INTO ListTask (name, owner, visibility) VALUES (:name, :owner, :visibility)';
        try {
            $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':owner' => array($owner, PDO::PARAM_INT), ':visibility' => array($visibility, PDO::PARAM_BOOL)));
        } catch (PDOException $e){
            echo '<script type="text/javascript">';
            echo ' alert("This list already exist")';
            echo '</script>';
        }
    }

    public function delete(int $id){
        $query = 'DELETE FROM ListTask WHERE id=:id';
        $this->con->executeQuery($query, array(':id' => array(id, PDO::PARAM_INT)));
    }
}