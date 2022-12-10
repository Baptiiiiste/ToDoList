<?php

class ControllerPublic{
    public function __construct(){
        global $rep,$vues, $base, $login, $mdp;

        $TabVueEreur = array();
        $con = new Connection($base, $login, $mdp);

        try{
            $action = Validation::val_action($_REQUEST['action']);

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
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->deletePublicTDL($con, $id);
                    $this->showTDLPublic($con);
                    break;
                case "addPublicTask":
                    $name = Validation::val_string($_POST['namePublicTask']);
                    $description = Validation::val_string($_POST['descriptionPublicTask']);
                    $listTask = Validation::val_string($_REQUEST['index']);
                    $this->addPublicTask($con, $name, $description, $listTask);
                    $this->showTDLPublic($con);
                    break;
                case "deletePublicTask":
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->deletePublicTask($con, $id);
                    $this->showTDLPublic($con);
                    break;
                case "login":
                    require($rep.$vues['loginFormUser']);
                    break;
                case "loginForm":
                    $pseudo = Validation::val_string($_POST['pseudo']);
                    $password = Validation::val_string($_POST['password']);
                    $this->logTheUser($con, $pseudo, $password);
                    $this->showTDLPublic($con);
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

    /**
     * @param Connection $con
     * @return void
     */
    function showTDLPublic(Connection $con){
        global $rep,$vues;
        $tdl = new ModelTodoList();
        $listTDLPublic = $tdl->getAllTDL($con, 'public');
        require($rep.$vues['public']);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @return void
     * @throws Exception
     */
    function addPublicTDL(Connection $con, string $name){
        $tdl = new ModelTodoList();
        $tdl->addTDL($con, $name, true);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @return void
     * @throws Exception
     */
    function deletePublicTDL(Connection $con, string $name){
        $tdl = new ModelTodoList();
        $tdl->deleteTDL($con, $name);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @param string $description
     * @param string $listTask
     * @return void
     * @throws Exception
     */
    function addPublicTask(Connection $con, string $name, string $description, string $listTask){
        $tdl = new ModelTodoList();
        $tdl->addTask($con, $name, $description, $listTask);
    }

    /**
     * @param Connection $con
     * @param int $id
     * @return void
     * @throws Exception
     */
    function deletePublicTask(Connection $con, int $id){
        $tdl = new ModelTodoList();
        $tdl->deleteTask($con, $id);
    }

    /**
     * @param Connection $con
     * @param string $pseudo
     * @param string $password
     * @return void
     */
    function logTheUser(Connection $con, string $pseudo, string $password){
        $user = new ModelUser();
        $user->connection($con, $pseudo, $password);
    }

}