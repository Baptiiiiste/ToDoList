<?php

class ControllerUser
{
    public function __construct(){
        global $rep,$vues, $base, $login, $mdp;

        $TabVueEreur = array();
        $con = new Connection($base, $login, $mdp);

        try{
            $action = Validation::val_action($_REQUEST['action']);

            switch($action){
                case "private":
                    $this->showTDLPrivate($con);
                    break;
                case "addPrivateTDL":
                    $name = Validation::val_string($_POST['namePublicTDL']);
                    $this->addPrivateTDL($con, $name);
                    $this->showTDLPublic($con);
                    break;
                case "deletePrivateTDL":
                    $name = Validation::val_string($_REQUEST['index']);
                    $this->deletePrivateTDL($con, $name);
                    $this->showTDLPrivate($con);
                    break;
                case "addPrivateTask":
                    $name = Validation::val_string($_POST['namePublicTask']);
                    $description = Validation::val_string($_POST['descriptionPublicTask']);
                    $listTask = Validation::val_string($_REQUEST['index']);
                    $this->addPrivateTask($con, $name, $description, $listTask);
                    $this->showTDLPrivate($con);
                    break;
                default:
                    $TabVueEreur[] = "Une erreur est survenue";
                    require($rep.$vues['erreur']);
                    break;
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
        exit(0);
    }

    function showTDLPrivate(Connection $con){
        global $rep,$vues;
        $tdl = new ModelTodoList();
        $modelUser = new ModelUser();
        $user = $modelUser->getConnectedUser($con);
        $listTDLPublic = $tdl->getAllTDL($con, 'private');
        require($rep.$vues['public']);
    }

    function addPrivateTDL(Connection $con, string $name){
        $tdl = new ModelTodoList();
        $tdl->addTDL($con, $name, true);
    }

    function deletePrivateTDL(Connection $con, string $name){
        $tdl = new ModelTodoList();
        $tdl->deleteTDL($con, $name);
    }

    function addPrivateTask(Connection $con, string $name, string $description, string $listTask){
        $tdl = new ModelTodoList();
        $tdl->addTask($con, $name, $description, $listTask);
    }
}