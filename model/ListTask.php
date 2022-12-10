<?php

class ListTask
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var bool
     */
    private bool $visibility;
    /**
     * @var
     */
    private $owner;
    /**
     * @var array
     */
    private $tabTask = [];

    /**
     * @param int $id
     * @param string $name
     * @param bool $visibility
     * @param $owner
     * @param array $tabTask
     */
    public function __construct(int $id, string $name, bool $visibility, $owner, array $tabTask)
    {
        $this->id = $id;
        $this->name = $name;
        $this->visibility = $visibility;
        $this->owner = $owner;
        $this->tabTask = $tabTask;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getVisibility(): string
    {
        if($this->visibility){
            return "Public";
        }
        return "Private";
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @return array
     */
    public function getTabTask(): array
    {
        return $this->tabTask;
    }
}