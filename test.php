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
    //try {
    //    $gatewayList->insert("Maison", 1, true);
    //} catch (PDOException $e){
    //    echo '<script type="text/javascript">';
    //    echo ' alert("This list already exist")';
    //    echo '</script>';
    //}
    //try {
    //    $gatewayList->insert("Devoir", 1);
    //} catch (PDOException $e){
    //    echo '<script type="text/javascript">';
    //    echo ' alert("This list already exist")';
    //    echo '</script>';
    //}

    // Test Task et TaskGateway
    require("./class/Task.php");
    require("./gateWay/TaskGateway.php");
    $gatewayTask = new TaskGateway($connexion);
    //try {
    //    $gatewayTask->insert("Repas", "Faire à manger", 1);
    //} catch (PDOException $e) {
    //    echo '<script type="text/javascript">';
    //    echo ' alert("This list already exist")';
    //    echo '</script>';
    //}
    //try {
    //    $gatewayTask->insert("Faire les courses", "Acheter du lait et revenir", 1);
    //} catch (PDOException $e) {
    //    echo '<script type="text/javascript">';
    //    echo ' alert("This list already exist")';
    //    echo '</script>';
    //}

    $Tab = $gatewayList->getTask(1);
    foreach ($Tab as $item) {
        echo "<p>".$item->getName()."</p>";
    }

    $gatewayList->delete(1);
?>
