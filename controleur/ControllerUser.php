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
                case "deletePrivateTask":
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->deletePrivateTask($con, $id);
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
    function showTDLPrivate(Connection $con): void
    {
        global $rep,$vues;
        $tdl = new ModelTodoList();
        $modelUser = new ModelUser();

        $nbTodoList_par_page = 10;
        $nbTodoList = $tdl->getNbTDL($con, false);

        $nbPages = ceil($nbTodoList/$nbTodoList_par_page);
        $page = Validation::val_page($_REQUEST['page'], $nbPages);

        $user = $modelUser->getConnectedUser();
        $listTDLPrivate = $tdl->getAllTDL($con, $page, $nbTodoList_par_page, false, $user);

        require($rep.$vues['private']);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @return void
     * @throws Exception
     */
    function addPrivateTDL(Connection $con, string $name): void
    {
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
    function deletePrivateTDL(Connection $con, int $id): void
    {
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
    function addPrivateTask(Connection $con, string $name, string $description, string $listTask): void
    {
        $tdl = new ModelTodoList();
        $tdl->addTask($con, $name, $description, $listTask);
    }

    /**
     * @param Connection $con
     * @param int $id
     * @return void
     * @throws Exception
     */
    function deletePrivateTask(Connection $con, int $id): void
    {
        $tdl = new ModelTodoList();
        $tdl->deleteTask($con, $id);
    }

    /**
     * @return void
     */
    function logOut(): void
    {
        global $rep,$vues;
        session_unset();
        session_destroy();
        $_SESSION = array();
        require($rep.$vues['loginFormUser']);
    }
}