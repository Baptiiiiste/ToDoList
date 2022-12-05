<?php
if($listTDLPrivate == -1){
    echo '<p>Login to add private list</p>';
} else if(count($listTDLPrivate) == 0){
    echo '<p>No List</p>';
} else {
    foreach ($listTDLPrivate as $value){
        require ("vues/todolist.php");
    }
}