<?php

class FrontController
{

    public function __construct()
    {
        global $rep,$vues;

        session_start();

        $listAction = array(
            'User' => array("private", "addPrivateTDL", "deletePrivateTDL", "addPrivateTask", "deletePrivateTask", "doPrivateTask" , "disconnect")
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

    /**
     * @param $listAction
     * @param $action
     * @return int|string|null
     */
    public function getActor($listAction, $action): int|string|null
    {
        foreach ($listAction as $actor){
            if (in_array($action, $actor)){
                return key($listAction);
            }
        }
        return NULL;
    }
}