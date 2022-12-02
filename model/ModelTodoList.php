<?php

class ModelTodoList
{

    public function __construct(){}

    function getAllTDL(int $owner, string $visibility = "public") {
        $gateway = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        if($visibility == "public"){
            $tabListTask = $gateway->getListTask($owner, 1);
        } else {
            $tabListTask = $gateway->getListTask($owner, 0);
        }
        return $tabListTask;
    }
}