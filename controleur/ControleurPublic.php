<?php

class ControleurPublic{
    public function __construct(){
        global $rep,$vues, $base, $login, $mdp;

        session_start();

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
                case "private":
                    $this->showTDLPrivate($con);
                    break;
                case "addTDL":
                    // afficher une todolist
                    break;
                case "deleteTDL":
                    // delete tdl
                    break;
                default:
                    $TabVueEreur[] = "Une erreur est survenue";
                    require($rep.$vues['erreur']);
                    break;
            }
        }catch (PDOException $e)
        {
            $TabVueEreur[] = "Erreur lors de la communication avec la base de données";
            require($rep.$vues['public']);

        }
        catch (Exception $e2)
        {
            $TabVueEreur[] = "Une erreur est survenue, re-essayez plus tard";
            require($rep.$vues['public']);

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

    function showTDLPrivate(Connection $con){
        global $rep,$vues;
        $tdl = new ModelTodoList();
        $user = $tdl->getConnectedUser($con);
        $user = 1;
        $listTDLPrivate = $tdl->getAllTDL($con, 'private', $user);
        require($rep.$vues['private']);
    }

    function validerAjoutTDL(array $tabVueEreur){
        global $rep,$vues;

        $name = $_GET['name'];
        $owner = $_GET['owner'];

        //Validation::val_form($name, true, $tabVueEreur);

        $tdl = new ModelTodoList();
        $tdl->addTDL($name, true, $owner);
    }

    function deleteTDL(){
        global $rep,$vues;
    }

}