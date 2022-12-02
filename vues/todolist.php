<?php
echo '<div class="card px-3">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">'. $value->getName() .'</h4>';
            echo '<div class="add-items d-flex">';
                echo '<form class="add-items d-flex" method="post" style="width: 100%">';
                    echo '<input type="text" name="nom" class="form-control todo-list-input" placeholder="Name" style="width: 30%">';
                    echo '<input type="text" name="description" class="form-control todo-list-input" placeholder="Description" style="width: 70%"> ';
                    echo '<input type="hidden" name="action" value="validationFormulaire">';
                    echo '<button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button> </div>';
                echo '</form>';

                echo '<div class="list-wrapper">';
                    echo '<ul class="d-flex flex-column-reverse todo-list">';

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

                    echo '</ul>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
echo '</div>';
?>