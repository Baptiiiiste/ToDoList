 <?php
if(count($listTDLPublic) == 0){
    echo '<p>No List</p>';
} else {
    foreach ($listTDLPublic as $value){
        require ("vues/todolist.php");
    }
}