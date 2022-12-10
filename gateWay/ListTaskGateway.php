<?php

class ListTaskGateway
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
     * @param string $owner
     * @param bool $visibility
     * @return void
     */
    public function insert(string $name, string $owner, bool $visibility)
    {
        if ($owner == "") {
            $query = 'INSERT INTO listtask (name, visibility) VALUES (:name, :visibility)';
            $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':visibility' => array($visibility, PDO::PARAM_BOOL)));
        } else {
            $query = 'INSERT INTO listtask (name, owner, visibility) VALUES (:name, :owner, :visibility)';
            $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':owner' => array($owner, PDO::PARAM_STR), ':visibility' => array($visibility, PDO::PARAM_BOOL)));
        }
    }

    /**
     * @param int $id
     * @param string $owner
     * @return void
     */
    public function delete(int $id, string $owner)
    {
        if($owner == ""){
            $query = 'DELETE FROM listtask WHERE id=:id';
            $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        } else {
            $query = 'DELETE FROM listtask WHERE id=:id AND owner=:owner';
            $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT), ':owner' => array($owner, PDO::PARAM_STR)));
        }

    }

    /**
     * @param int $id
     * @return array
     */
    public function getTask(int $id): array
    {
        $tab = [];
        $query = 'SELECT id, name, description, done, listTask FROM task WHERE listTask=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tab[] = new Task($item['id'], $item['name'], $item['description'], $item['done'], $item['listTask']);
        }
        return $tab;
    }

    /**
     * @return array
     */
    public function getPublicList(): array
    {
        $tab = [];
        $query = 'SELECT id, name, visibility, owner FROM listtask WHERE visibility = :visibility';
        $this->con->executeQuery($query, array(':visibility' => array(1, PDO::PARAM_INT)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tabTask = $this->getTask($item['id']);
            $tab[] = new ListTask($item['id'], $item['name'], $item['visibility'], $item['owner'], $tabTask);
        }
        return $tab;
    }

    /**
     * @param string $owner
     * @return array
     */
    public function getPrivateList(string $owner): array
    {
        $tab = [];
        $query = 'SELECT id, name, visibility, owner FROM listtask WHERE visibility = :visibility AND owner = :owner';
        $this->con->executeQuery($query, array(':visibility' => array(0, PDO::PARAM_INT), ':owner' => array($owner, PDO::PARAM_STR)));

        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tabTask = $this->getTask($item['id']);
            $tab[] = new ListTask($item['id'], $item['name'], $item['visibility'], $item['owner'], $tabTask);
        }
        return $tab;
    }
}