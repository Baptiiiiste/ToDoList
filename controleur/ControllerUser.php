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
                    $name = Validation::val_string($_POST['namePrivateTDL']);
                    $this->addPrivateTDL($con, $name);
                    $this->showTDLPrivate($con);
                    break;
                case "deletePrivateTDL":
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->deletePrivateTDL($con, $id);
                    $this->showTDLPrivate($con);
                    break;
                case "addPrivateTask":
                    $name = Validation::val_string($_POST['namePrivateTask']);
                    $description = Validation::val_string($_POST['descriptionPrivateTask']);
                    $listTask = Validation::val_string($_REQUEST['index']);
                    $this->addPrivateTask($con, $name, $description, $listTask);
                    $this->showTDLPrivate($con);
                    break;
                case "disconnect":
                    $this->logOut();
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
     * @throws Exception
     */
    function showTDLPrivate(Connection $con){
        global $rep,$vues;
        $tdl = new ModelTodoList();
        $modelUser = new ModelUser();
        $user = $modelUser->getConnectedUser();
        $listTDLPrivate = $tdl->getAllTDL($con, 'private', $user);
        require($rep.$vues['private']);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @return void
     * @throws Exception
     */
    function addPrivateTDL(Connection $con, string $name){
        $tdl = new ModelTodoList();
        $modelUser = new ModelUser();
        $user = $modelUser->getConnectedUser();
        $tdl->addTDL($con, $name, false, $user);
    }

    /**
     * @param Connection $con
     * @param int $id
     * @return void
     * @throws Exception
     */
    function deletePrivateTDL(Connection $con, int $id){
        $tdl = new ModelTodoList();
        $modelUser = new ModelUser();
        $user = $modelUser->getConnectedUser();
        $tdl->deleteTDL($con, $id, $user);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @param string $description
     * @param string $listTask
     * @return void
     * @throws Exception
     */
    function addPrivateTask(Connection $con, string $name, string $description, string $listTask){
        $tdl = new ModelTodoList();
        $modelUser = new ModelUser();
        $user = $modelUser->getConnectedUser();
        $tdl->addTask($con, $name, $description, $listTask, $user);
    }

    /**
     * @return void
     */
    function logOut(){
        global $rep,$vues;
        session_unset();
        session_destroy();
        $_SESSION = array();
        require($rep.$vues['loginFormUser']);
    }
}