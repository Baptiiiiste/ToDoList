<?php

class Task
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
     * @var string
     */
    private string $description;
    /**
     * @var bool
     */
    private bool $done;
    /**
     * @var int
     */
    private int $idList;

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param bool $done
     * @param int $idList
     */
    public function __construct(int $id, string $name, string $description, bool $done, int $idList)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->done = $done;
        $this->idList = $idList;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->done;
    }

    /**
     * @return int
     */
    public function getIdList(): int
    {
        return $this->idList;
    }

}