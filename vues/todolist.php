<div class="card px-3 mb-4">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between mb-3">
            <?php
            echo '<h4 class="card-title">'. $value->getName() .'</h4>';
            echo '<a href="index.php?action=delete'.$value->getVisibility().'TDL&index='.$value->getId().'" class="add btn btn-primary font-weight-bold todo-list-add-btn">Delete</a>'
            ?>

        </div>

        <div class="add-items d-flex flex-column">
            <?php
            echo '<form class="add-items d-flex" method="post" action="index.php?action=add'.$value->getVisibility().'Task&index='.$value->getId().'" style="width: 100%">';
                echo '<input type="text" name="name'.$value->getVisibility().'Task" class="form-control todo-list-input" placeholder="Name" style="width: 30%; margin-right: 5px">';
                echo '<input type="text" name="description'.$value->getVisibility().'Task" class="form-control todo-list-input" placeholder="Description" style="width: 70%; margin-right: 5px">';
            ?>
                <button type="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
            </form>

            <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse todo-list p-0">
                    <?php
                        foreach ($value->getTabTask() as $val){
                            if($val->isDone()){
                                echo '<li style="list-style-type: none;">';
                                echo '<div class="form-check d-flex justify-content-between flex-row align-items-center p-0" style="width: 100%"> <div style="display: flex; align-items: center"><input class="checkbox" style="margin-right: 5px" type="checkbox" checked> <label class="form-check-label" style="text-decoration: line-through">'.$val->getName().' : '.$val->getDescription().'</label></div><a style="margin-left: 5px; margin-top: 2px" href="index.php?action=delete'.$value->getVisibility().'Task&index='.$val->getId().'" class="add btn btn-outline-primary font-weight-bold todo-list-add-btn">X</a>';
                                echo '</li>';
                            } else{
                                echo '<li style="list-style-type: none;">';
                                echo '<div class="form-check d-flex justify-content-between flex-row align-items-center p-0" style="width: 100%"> <div style="display: flex; align-items: center"><input class="checkbox" style="margin-right: 5px" type="checkbox"> <label class="form-check-label">'.$val->getName().' : '.$val->getDescription().'</label></div><a style="margin-left: 5px; margin-top: 2px" href="index.php?action=delete'.$value->getVisibility().'Task&index='.$val->getId().'" class="add btn btn-outline-primary font-weight-bold todo-list-add-btn">X</a>';
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>