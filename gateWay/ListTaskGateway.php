<?php

class ListTaskGateway
{
    private $con;
    public function __construct(Connection $con) {
        $this->con = $con;
    }

    public function insert(string $name, int $owner, bool $visibility = false) {
        $query = 'INSERT INTO ListTask (name, owner, visibility) VALUES (:name, :owner, :visibility)';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':owner' => array($owner, PDO::PARAM_INT), ':visibility' => array($visibility, PDO::PARAM_BOOL)));
    }

    public function delete(int $id){
        $query = 'DELETE FROM ListTask WHERE id=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR)));
    }

    public function getTask(int $id){
        $query = 'SELECT name, description, done, listTask FROM Task WHERE listTask=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tab[] = new Task($item['name'], $item['description'], $item['done'], $item['listTask']);
        }

        return $tab;
    }
}