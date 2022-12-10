<?php

class User
{
    /**
     * @var string
     */
    private string $pseudo;

    /**
     * @param string $pseudo
     */
    public function __construct(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
}