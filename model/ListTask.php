<?php

class ListTask
{
    private $name;
    private $visibility;
    private $owner;
    private $tabTask = [];

    /**
     * @param $name
     * @param $visibility
     * @param $owner
     * @param array $tabTask
     */
    public function __construct($name, $visibility, $owner, array $tabTask)
    {
        $this->name = $name;
        $this->visibility = $visibility;
        $this->owner = $owner;
        $this->tabTask = $tabTask;
    }

    /**
     * @return array
     */
    public function getTabTask(): array
    {
        return $this->tabTask;
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
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }
}