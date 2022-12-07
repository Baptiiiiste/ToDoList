<?php

class ControllerUser
{
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
                case "private":
                    $this->showTDLPrivate($con);
                    break;
                case "addPrivateTDL":
                    // afficher une todolist
                    break;
                case "deletePrivateTDL":
                    // delete tdl
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