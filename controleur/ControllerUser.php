<?php

class ControllerUser
{
    /**
     * @var ModelTodoList
     */
    private ModelTodoList $tdl;
    /**
     * @var ModelUser
     */
    private ModelUser $modelUser;

    public function __construct(){
        global $rep, $vues, $base, $login, $mdp;

        $TabVueEreur = array();
        $con = new Connection($base, $login, $mdp);

        $this->tdl = new ModelTodoList($con);
        $this->modelUser = new ModelUser();

        try{
            $action = Validation::val_action($_REQUEST['action']);

            switch($action){
                case "private":
                    $this->showTDLPrivate();
                    break;
                case "addPrivateTDL":
                    $name = Validation::val_string($_POST['namePrivateTDL']);
                    $this->addPrivateTDL($name);
                    header("Location: index.php?action=private");
                    $this->showTDLPrivate();
                    break;
                case "deletePrivateTDL":
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->deletePrivateTDL($id);
                    header("Location: index.php?action=private");
                    $this->showTDLPrivate();
                    break;
                case "addPrivateTask":
                    $name = Validation::val_string($_POST['namePrivateTask']);
                    $description = Validation::val_string($_POST['descriptionPrivateTask']);
                    $listTask = Validation::val_string($_REQUEST['index']);
                    $this->addPrivateTask($name, $description, $listTask);
                    header("Location: index.php?action=private");
                    $this->showTDLPrivate();
                    break;
                case "deletePrivateTask":
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->deletePrivateTask($con, $id);
                    header("Location: index.php?action=private");
                    $this->showTDLPrivate();
                    break;
                case "doPrivateTask":
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->actionPrivateTask($con, $id);
                    header("Location: index.php?action=private");
                    $this->showTDLPrivate();
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
     * @return void
     * @throws Exception
     */
    function showTDLPrivate(): void
    {
        global $rep,$vues;

        $nbTodoList_par_page = 3;
        $nbTodoList = $this->tdl->getNbTDL(false);

        $nbPages = ceil($nbTodoList/$nbTodoList_par_page);
        $page = Validation::val_page($_REQUEST['page'], $nbPages);

        $user = $this->modelUser->getConnectedUser();
        $listTDLPrivate = $this->tdl->getAllTDL($page, $nbTodoList_par_page, false, $user);

        require($rep.$vues['private']);
    }

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    function addPrivateTDL(string $name): void
    {
        $user = $this->modelUser->getConnectedUser();
        $this->tdl->addTDL($name, false, $user);
    }

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    function deletePrivateTDL(int $id): void
    {
        $user = $this->modelUser->getConnectedUser();
        $this->tdl->deleteTDL($id, $user);
    }

    /**
     * @param string $name
     * @param string $description
     * @param string $listTask
     * @return void
     * @throws Exception
     */
    function addPrivateTask(string $name, string $description, string $listTask): void
    {
        $this->tdl->addTask($name, $description, $listTask);
    }

    /**
     * @param Connection $con
     * @param int $id
     * @return void
     * @throws Exception
     */
    function deletePrivateTask(Connection $con, int $id): void
    {
        $this->tdl->deleteTask($con, $id);
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

    /**
     * @param Connection $con
     * @param string $id
     * @return void
     * @throws Exception
     */
    private function actionPrivateTask(Connection $con, string $id): void
    {
        $this->tdl->doTask($con, $id);
    }
}