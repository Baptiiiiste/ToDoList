<div class="card px-3 mb-4">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between mb-3">
            <?php
            echo '<h4 class="card-title">'. $value->getName() .'</h4>';
            echo '<a href="index.php?action=deletePublicTDL&index='.$value->getName().'" class="add btn btn-primary font-weight-bold todo-list-add-btn">Delete</a>'
            ?>

        </div>

        <div class="add-items d-flex flex-column">
            <?php
            echo '<form class="add-items d-flex" method="post" action="index.php?action=addPublicTask&index='.$value->getName().'" style="width: 100%">'
            ?>
                <input type="text" name="namePublicTask" class="form-control todo-list-input" placeholder="Name" style="width: 30%; margin-right: 5px">
                <input type="text" name="descriptionPublicTask" class="form-control todo-list-input" placeholder="Description" style="width: 70%; margin-right: 5px">
                <button type="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
            </form>

            <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse todo-list">
                    <?php
                        foreach ($value->getTabTask() as $val){
                            if($val->getDone()){
<<<<<<< HEAD
                                echo '<li style="list-style-type: none; margin-left: -50px; text-decoration: line-through">';
                                echo '<div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox" checked>'.$val->getName().' : '.$val->getDescription().'</label><a href="index.php?action=deletePublicTask&index='.$val->getName().'" class="add btn btn-primary font-weight-bold todo-list-add-btn">X</a>';
=======
                                echo '<li style="list-style-type: none; margin-left: -50px" class="completed">';
                                echo '<div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox" checked="">'.$val->getName().' : '.$val->getDescription().'</label><a href="index.php?action=deletePublicTask&index='.$val->getId().'" class="add btn btn-primary font-weight-bold todo-list-add-btn">X</a>';
>>>>>>> 7f74f1992e37686613540f895a3511121e7d8b75
                                echo '</li>';
                            } else{
                                echo '<li style="list-style-type: none; margin-left: -50px">';
                                echo '<div class="form-check d-flex justify-content-between flex-row align-items-center"> <label class="form-check-label"> <input class="checkbox" style="margin-right: 5px" type="checkbox">'.$val->getName().' : '.$val->getDescription().'</label><a style="margin-left: 5px; margin-top: 2px" href="index.php?action=deletePublicTask&index='.$val->getId().'" class="add btn btn-outline-primary font-weight-bold todo-list-add-btn">X</a>';
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>