<?php

class ModelTodoList
{

    public function __construct(){}

    function getAllTDL(string $visibility = "public") {
        $gateway = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        if($visibility == "public"){
            $tabListTask = $gateway->getPublicTDL("1");
        } else {
            $tabListTask = $gateway->getPrivateTDL("1");
        }
        return $tabListTask;
    }
}