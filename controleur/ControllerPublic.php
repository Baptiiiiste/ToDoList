<?php

class ControllerPublic{
    public function __construct(){
        global $rep,$vues, $base, $login, $mdp;

        $TabVueEreur = array();
        $con = new Connection($base, $login, $mdp);

        try{
            if(isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            } else {
                $action = NULL;
            }

            switch($action){
                case NULL:
                    $this->showTDLPublic($con);
                    break;
                case "addPublicTDL":
                    $name = Validation::val_string($_POST['namePublicTDL']);
                    $this->addPublicTDL($con, $name);
                    $this->showTDLPublic($con);
                    break;
                case "deletePublicTDL":
                    $name = Validation::val_string($_REQUEST['index']);
                    $this->deletePublicTDL($con, $name);
                    $this->showTDLPublic($con);
                    break;
                case "addPublicTask":
                    $name = Validation::val_string($_POST['namePublicTask']);
                    $description = Validation::val_string($_POST['descriptionPublicTask']);
                    $listTask = Validation::val_string($_REQUEST['index']);
                    $this->addPublicTask($con, $name, $description, $listTask);
                    $this->showTDLPublic($con);
                    break;
                case "login":
                    require($rep.$vues['loginFormUser']);
                    break;
                default:
                    $TabVueEreur[] = "Une erreur est survenue";
                    require($rep.$vues['erreur']);
                    break;
            }
        }catch (PDOException $e)
        {
            $TabVueEreur[] = "Erreur lors de la communication avec la base de données";
            require($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $TabVueEreur[] = "Une erreur est survenue, re-essayez plus tard";
            require($rep.$vues['erreur']);
        }
        exit(0);
    }

    function showTDLPublic(Connection $con){
        global $rep,$vues;
        $tdl = new ModelTodoList();
        $user = $tdl->getConnectedUser($con);
        $user = 1;
        $listTDLPublic = $tdl->getAllTDL($con, 'public');
        require($rep.$vues['public']);
    }

    function addPublicTDL(Connection $con, string $name){
        //$owner = Validation::val_string($_SESSION['login']);
        //if($owner == "" || $name == ""){
        //    throw new Exception("error add todolist");
        //}
        $tdl = new ModelTodoList();
        $tdl->addTDL($con, $name, 'loris', true);
    }

    function deletePublicTDL(Connection $con, string $name){
        //$owner = Validation::val_string($_SESSION['login']);
        //if($owner == "" || $name == ""){
        //    throw new Exception("error add todolist");
        //}
        $tdl = new ModelTodoList();
        $tdl->deleteTDL($con, $name, 'loris', true);
    }

    function addPublicTask(Connection $con, string $name, string $description, string $listTask){
        $tdl = new ModelTodoList();
        $tdl->addTask($con, $name, $description, $listTask);
    }

}