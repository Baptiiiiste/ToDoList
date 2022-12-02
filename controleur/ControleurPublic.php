<?php

class ControleurPublic{
    public function __construct(){
        global $rep,$vues;

        session_start();

        $TabVueEreur = array();

        try{
            $action = $_REQUEST['action'];
            switch($action){
                case NULL:
                    // afficher les todolist publiques
                    break;
                case "addTDL":
                    // afficher une todolist
                    break;
                case "deleteTDL":
                    // delete tdl
                    break;
                default:
                    $TabVueEreur[] = "Une erreur est survenue";
                    require($rep.$vues['erreur.php']);
                    break;
            }
        }catch (PDOException $e)
        {
            $TabVueEreur[] = "Erreur lors de la communication avec la base de données";
            require ("../vues/home.php");

        }
        catch (Exception $e2)
        {
            $TabVueEreur[] = "Une erreur est survenue, re-essayez plus tard";
            require ("../vues/home.php");
        }
        exit(0);
    }




    function ValidationFormulaire(array $TabVueEreur) {

        $nom=$_POST['nom'];
        $age=$_POST['description'];
        Validation::val_form($nom,$age,$TabVueEreur);

        //$model = new Simplemodel();
        //$data=$model->get_data();

        $dVue = array (
            'name' => "",
            'description' => "",
            'done' => false,
        );
        require ("../vues/home.php");
    }


    function showTDL(){

    }

}