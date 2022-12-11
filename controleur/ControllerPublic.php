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
                case "doPublicTask":
                    $id = Validation::val_string($_REQUEST['index']);
                    $this->actionPublicTask($con, $id);
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
                case "signin":
                    require($rep.$vues['signinFormPublic']);
                    break;
                case "signinForm":
                    $pseudo = Validation::val_string($_POST['pseudo']);
                    $password = Validation::val_string($_POST['password']);
                    $this->createTheUser($con, $pseudo, $password);
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
     * @throws Exception
     */
    function showTDLPublic(Connection $con): void
    {
        global $rep,$vues;
        $tdl = new ModelTodoList();

        $nbTodoList_par_page = 3;
        $nbTodoList = $tdl->getNbTDL($con, true);

        $nbPages = ceil($nbTodoList/$nbTodoList_par_page);
        $page = Validation::val_page($_REQUEST['page'], $nbPages);

        $listTDLPublic = $tdl->getAllTDL($con, $page, $nbTodoList_par_page, true);
        require($rep.$vues['public']);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @return void
     * @throws Exception
     */
    function addPublicTDL(Connection $con, string $name): void
    {
        $tdl = new ModelTodoList();
        $tdl->addTDL($con, $name, true);
    }

    /**
     * @param Connection $con
     * @param string $name
     * @return void
     * @throws Exception
     */
    function deletePublicTDL(Connection $con, string $name): void
    {
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
    function addPublicTask(Connection $con, string $name, string $description, string $listTask): void
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
    function deletePublicTask(Connection $con, int $id): void
    {
        $tdl = new ModelTodoList();
        $tdl->deleteTask($con, $id);
    }

    function actionPublicTask(Connection $con, int $id): void
    {
        $tdl = new ModelTodoList();
        $tdl->doTask($con, $id);
    }

    /**
     * @param Connection $con
     * @param string $pseudo
     * @param string $password
     * @return void
     * @throws Exception
     */
    function logTheUser(Connection $con, string $pseudo, string $password): void
    {
        global $rep,$vues;
        $user = new ModelUser();
        if($user->isUser() != null){
            require($rep.$vues['public']);
        }else {
            $user->connection($con, $pseudo, $password);
        }
    }

    /**
     * @param Connection $con
     * @param string $pseudo
     * @param string $password
     * @return void
     * @throws Exception
     */
    function createTheUser(Connection $con, string $pseudo, string $password): void
    {
        global $rep,$vues;
        $user = new ModelUser();
        if($user->isUser() != null){
            require($rep.$vues['public']);
        }else{
            if($user->createUser($con, $pseudo, $password) == true){
                $user->connection($con, $pseudo, $password);
            }
        }
    }

}