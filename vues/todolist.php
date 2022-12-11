<div class="card p-3 m-4">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between mb-3">
            <?php
            echo '<h4 class="card-title">'. $value->getName() .'</h4>';
            echo '<a href="index.php?action=delete'.$value->getVisibility().'TDL&index='.$value->getId().'&page='.$page.'" class="add btn btn-primary font-weight-bold todo-list-add-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg></a>'
            ?>

        </div>

        <div class="add-items d-flex flex-column">
            <?php
            echo '<form class="add-items d-flex mb-2" method="post" action="index.php?action=add'.$value->getVisibility().'Task&index='.$value->getId().'&page='.$page.'" style="width: 100%">';
                echo '<input type="text" name="name'.$value->getVisibility().'Task" class="form-control todo-list-input" placeholder="Name" style="width: 30%; margin-right: 5px">';
                echo '<input type="text" name="description'.$value->getVisibility().'Task" class="form-control todo-list-input" placeholder="Description" style="width: 70%; margin-right: 5px">';
            ?>
                <button type="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
            </form>

            <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse todo-list p-0">
                    <?php
                        foreach ($value->getTabTask() as $val){
                            echo '<li style="list-style-type: none;">
                                      <div class="form-check d-flex justify-content-between flex-row align-items-center p-0" style="width: 100%"> 
                                          <div style="display: flex; align-items: center">';
                            if($val->isDone()){
                                echo '<a href="index.php?action=do'.$value->getVisibility().'Task&index='.$val->getId().'&page='.$page.'" style="width: 25px; padding: 5px; height: 25px; margin-right: 10px" class="d-flex flex-row add btn btn-primary font-weight-bold todo-list-add-btn"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></a>
                                      <label class="form-check-label" style="text-decoration: line-through">'.$val->getName().' : '.$val->getDescription().'</label>';
                            } else {
                                echo '<a href="index.php?action=do'.$value->getVisibility().'Task&index='.$val->getId().'&page='.$page.'" style="width: 25px; height: 25px; margin-right: 10px" class="d-flex flex-row add btn btn-outline-primary font-weight-bold todo-list-add-btn"></a>
                                      <label class="form-check-label">' . $val->getName() . ' : ' . $val->getDescription() . '</label>';
                            }
                            echo '        </div>
                                          <a href="index.php?action=delete'.$value->getVisibility().'Task&index='.$val->getId().'&page='.$page.'" style="width: 25px; height: 25px; padding: 5px" class="d-flex flex-row add btn btn-outline-primary font-weight-bold todo-list-add-btn"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg></a>
                                      </div>
                                  </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>