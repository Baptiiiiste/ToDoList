<?php

class Task
{
    private $id;
    private $name;
    private $description;
    private $done;
    private $idList;

    /**
     * @param $name
     * @param $description
     * @param $done
     * @param $idList
     */
    public function __construct($id, $name, $description, $done, $idList)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->done = $done;
        $this->idList = $idList;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * @return mixed
     */
    public function getIdList()
    {
        return $this->idList;
    }
}