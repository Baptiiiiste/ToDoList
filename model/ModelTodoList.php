<?php

class ModelTodoList
{
    function getAllTDL(string $visibility = "public") {
        $gateway = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=todolist", "root", "loris"));
        if($visibility == "public"){
            $tabListTask = $gateway->getPublicTDL();
        } else {
            $tabListTask = $gateway->getPrivateTDL();
        }
        return $tabListTask;
    }
}