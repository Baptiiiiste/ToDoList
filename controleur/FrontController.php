<?php

class FrontController
{

    public function __construct()
    {
        global $rep,$vues;

        session_start();

        $listAction = array(
            'User' => array("private", "addPrivateTDL", "delPrivateTDL", "disconnect")
        );

        try{
            $action = Validation::val_action($_REQUEST['action']);

            $actor = $this->getActor($listAction, $action);

            if($actor != NULL){
                $StringModel = 'Model'.$actor;
                $mdl = new $StringModel();

                $StringIsSomething = 'is'.$actor;
                $resp = $mdl->$StringIsSomething();
                if($resp == NULL){
                    $StringLogin = 'loginForm'.$actor;
                    require($rep.$vues[$StringLogin]);
                } else {
                    $StringController = 'Controller'.$actor;
                    $controller = new $StringController();
                }
            } else {
                $controller = new ControllerPublic();
            }
        }catch (PDOException $e)
        {
            $TabVueEreur[] = $e->getMessage();
            require($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $TabVueEreur[] = $e2->getMessage();
            require($rep.$vues['erreur']);
        }
    }

    public function getActor($listAction, $action){
        foreach ($listAction as $actor){
            if (in_array($action, $actor)){
                return key($listAction);
            }
        }
        return NULL;
    }
}