<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base = "mysql:host=londres.uca.local;dbname=todolist";
$login = "babonneau";
$mdp = "achanger";

//Vues

$vues['erreur']='vues/erreur.php';
$vues['index']='index.php';
$vues['public']='vues/public.php';
$vues['home']='vues/home.php';


?>