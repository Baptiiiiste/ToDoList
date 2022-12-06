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
                            echo '<li class="completed">';
                            echo '<div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox" checked="">'. $val->getName() .': '. $val->getDescription() .'<i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>';
                            echo '</li>';
                        } else{
                            echo '<li>';
                            echo '<div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox">'. $val->getName() .': '. $val->getDescription()  .'<i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>