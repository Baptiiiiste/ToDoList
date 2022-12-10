<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD
$base = "mysql:host=localhost;dbname=todolist";
$login = "root";
$mdp = "";

//Vues

$vues['erreur']='vues/erreur.php';
$vues['index']='index.php';
$vues['public']='vues/public.php';
$vues['private']='vues/private.php';
$vues['loginFormUser']='vues/loginFormUser.php';
$vues['signinFormPublic']='vues/signinFormPublic.php';


?>