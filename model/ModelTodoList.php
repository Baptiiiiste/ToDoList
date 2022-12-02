<?php

class ModelTodoList
{

    public function __construct(){}

    function getAllTDL(string $visibility = "public") {
        $gateway = new ListTaskGateway(new Connection("mysql:host=londres.uca.local;dbname=todolist", "babonneau", "achanger"));
        if($visibility == "public"){
            $tabListTask = $gateway->getPublicTDL();
        } else {
            $tabListTask = $gateway->getPrivateTDL();
        }
        return $tabListTask;
    }
}