<?php

class User
{
    private $pseudo;

    /**
     * @param $pseudo
     */
    public function __construct($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }


}