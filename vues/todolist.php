<div class="card px-3">
        <div class="card-body">
            <h4 class="card-title">TITRE TO DO LIST</h4>
            <div class="add-items d-flex"> <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button> </div>
            <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse todo-list">
                        <!-- // REQUIRE ICI //  -->
                        <?php
                            require("task.php");
                        ?>
                </ul>
            </div>
        </div>
    </div>