<?php

class ListTaskGateway
{
    private $con;
    public function __construct(Connection $con) {
        $this->con = $con;
    }

    public function insert(string $name, string $owner, bool $visibility)
    {
        if ($owner == "") {
            $query = 'INSERT INTO ListTask (name, visibility) VALUES (:name, :visibility)';
            $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':visibility' => array($visibility, PDO::PARAM_BOOL)));
        } else {
            $query = 'INSERT INTO ListTask (name, owner, visibility) VALUES (:name, :owner, :visibility)';
            $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':owner' => array($owner, PDO::PARAM_STR), ':visibility' => array($visibility, PDO::PARAM_BOOL)));
        }
    }

    public function delete(string $name)
    {
        $query = 'DELETE FROM ListTask WHERE name=:name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));
    }

    public function getTask(string $name)
    {
        $tab = [];
        $query = 'SELECT name, description, done, listTask FROM Task WHERE listTask=:name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tab[] = new Task($item['name'], $item['description'], $item['done'], $item['listTask']);
        }
        return $tab;
    }

    public function getPublicList(){
        $tab = [];
        $query = 'SELECT name, visibility, owner FROM ListTask WHERE visibility = :visibility';
        $this->con->executeQuery($query, array(':visibility' => array(1, PDO::PARAM_INT)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tabTask = $this->getTask($item['name']);
            $tab[] = new ListTask($item['name'], $item['visibility'], $item['owner'], $tabTask);
        }
        return $tab;
    }

    public function getPrivateList(string $owner){
        $tab = [];
        $query = 'SELECT name, visibility, owner FROM ListTask WHERE visibility = :visibility AND owner = :owner';
        $this->con->executeQuery($query, array(':visibility' => array(0, PDO::PARAM_INT), ':owner' => array($owner, PDO::PARAM_STR)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tabTask = $this->getTask($item['name']);
            $tab[] = new ListTask($item['name'], $item['visibility'], $item['owner'], $tabTask);
        }
        return $tab;
    }
}