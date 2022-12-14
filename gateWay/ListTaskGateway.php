<?php

class ListTaskGateway
{
    /**
     * @var Connection
     */
    private Connection $con;

    /**
     * @param Connection $con
     */
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    /**
     * @param string $name
     * @param $owner
     * @param bool $visibility
     * @return void
     */
    public function insert(string $name, $owner, bool $visibility): void
    {
        $query = 'INSERT INTO listtask (name, owner, visibility) VALUES (:name, :owner, :visibility)';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR), ':owner' => array($owner, PDO::PARAM_STR), ':visibility' => array($visibility, PDO::PARAM_BOOL)));
    }

    /**
     * @param int $id
     * @param $owner
     * @return void
     */
    public function delete(int $id, $owner): void
    {
        if($owner == null){
            $query = 'DELETE FROM listtask WHERE id=:id AND owner IS NULL';
            $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        } else {
            $query = 'DELETE FROM listtask WHERE id=:id AND owner = :owner';
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
     * @param bool $visibility
     * @param int $page
     * @param int $nbTodoList_par_page
     * @param $owner
     * @return array
     */
    public function getList(bool $visibility, int $page, int $nbTodoList_par_page, $owner): array
    {
        $tab = [];
        if($visibility){
            $query = 'SELECT id, name, visibility, owner FROM listtask WHERE visibility = :visibility LIMIT :page, :n';
            $this->con->executeQuery($query, array(':visibility' => array(true, PDO::PARAM_BOOL), ':page' => array(($page-1)*$nbTodoList_par_page, PDO::PARAM_INT), ':n' => array($nbTodoList_par_page, PDO::PARAM_INT)));
        } else {
            $query = 'SELECT id, name, visibility, owner FROM listtask WHERE visibility = :visibility AND owner = :owner LIMIT :page, :n';
            $this->con->executeQuery($query, array(':visibility' => array(false, PDO::PARAM_BOOL), ':owner' => array($owner, PDO::PARAM_STR), ':page' => array(($page-1)*$nbTodoList_par_page, PDO::PARAM_INT), ':n' => array($nbTodoList_par_page, PDO::PARAM_INT)));
        }
        $result = $this->con->getResults();
        foreach ($result as $item) {
            $tabTask = $this->getTask($item['id']);
            $tab[] = new ListTask($item['id'], $item['name'], $item['visibility'], $item['owner'], $tabTask);
        }

        return $tab;
    }

    /**
     * @param bool $visibility
     * @return int
     */
    public function getNbTDL(bool $visibility): int
    {
        $query = "SELECT count(*) FROM listtask WHERE visibility = :visibility";
        $this->con->executeQuery($query, array(":visibility" => array($visibility, PDO::PARAM_BOOL)));
        return $this->con->getResults()[0][0];
    }
}