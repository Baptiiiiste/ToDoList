<?php

class Controleur{
    public function __construct()
    {

        session_start();

        $TabVueEreur = array();

        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL:
                    $this->Reinitialiser();
                    break;
                case "validationFormulaire":
                    echo "<p>coucou</p>";
                    //$this->ValidationFormulaire($TabVueEreur);
                    break;
                default:
                    $TabVueEreur[] = "Erreur lors de la récupération du formulaire";
                    require("../vues/home.php");
                    break;
            }
        } catch (PDOException $e) {
            $TabVueEreur[] = "Erreur lors de la communication avec la base de données";
            require("../vues/home.php");

        } catch (Exception $e2) {
            $TabVueEreur[] = "Une erreur est survenue, re-essayez plus tard";
            require("../vues/home.php");
        }
        exit(0);
    }


    function Reinitialiser() {

        $dVue = array (
            'name' => "",
            'description' => "",
            'done' => false,
        );
        require ("../vues/home.php");
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


}