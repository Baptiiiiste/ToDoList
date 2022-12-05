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
        $tab = [];
        $query = 'SELECT name, description, done, listTask FROM Task WHERE listTask=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tab[] = new Task($item['name'], $item['description'], $item['done'], $item['listTask']);
        }
        return $tab;
    }

    public function getPublicList(){
        $tab = [];
        $query = 'SELECT id, name, visibility, owner FROM ListTask WHERE visibility = :visibility';
        $this->con->executeQuery($query, array(':visibility' => array(1, PDO::PARAM_INT)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tabTask = $this->getTask($item['id']);
            $tab[] = new ListTask($item['name'], $item['visibility'], $item['owner'], $tabTask);
        }
        return $tab;
    }

    public function getPrivateList(int $owner){
        $tab = [];
        $query = 'SELECT id, name, visibility, owner FROM ListTask WHERE visibility = :visibility AND owner = :owner';
        $this->con->executeQuery($query, array(':visibility' => array(0, PDO::PARAM_INT), ':owner' => array($owner, PDO::PARAM_INT)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tabTask = $this->getTask($item['id']);
            $tab[] = new ListTask($item['name'], $item['visibility'], $item['owner'], $tabTask);
        }
        return $tab;
    }
}