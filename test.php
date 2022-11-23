<?php
    // Test connexion
    require("./class/Connexion.php");
    $dsn = "mysql:host=localhost;dbname=todolist";
    $user = "root";
    $pass = "loris";
    try {
        $connexion = new Connection($dsn, $user, $pass);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    // Test ListTask et ListTaskGateway
    require("./class/ListTask.php");
    require("./gateWay/ListTaskGateway.php");
    $gatewayList = new ListTaskGateway($connexion);
    //$gatewayList->insert("Maison", 1, true);
    //$gatewayList->insert("Devoir", 1);

    // Test Task et TaskGateway
    require("./class/Task.php");
    require("./gateWay/TaskGateway.php");
    $gatewayTask = new TaskGateway($connexion);
    $gatewayTask->insert("Repas", "Faire à manger", 1);
?>
