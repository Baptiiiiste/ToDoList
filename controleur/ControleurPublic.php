<?php

class ControleurPublic{
    public function __construct(){
        global $rep,$vues;

        session_start();

        $TabVueEreur = array();

        try{
            if(isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            } else {
                $action = NULL;
            }

            switch($action){
                case NULL:
                    $this->showTDL();
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

    function showTDL(){
        global $rep,$vues;
        $tdl = new ModelTodoList();
        $listTDL = $tdl->getAllTDL();
        require($rep.$vues['public']);
    }

    function validerAjoutTDL(array $tabVueEreur){
        global $rep,$vues;

        $name = $_GET['name'];
        $owner = $_GET['owner'];

        //Validation::val_form($name, true, $tabVueEreur);

        $tdl = new ModelTodoList();
        $tdl->addTDL(name, true, $owner);
    }

    function deleteTDL(){
        global $rep,$vues;
    }

}