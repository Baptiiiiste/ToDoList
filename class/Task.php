<?php

class Task
{
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
    public function __construct($name, $description, $done, $idList)
    {
        $this->name = $name;
        $this->description = $description;
        $this->done = $done;
        $this->idList = $idList;
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