<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUDUM List</title>
    <link rel="stylesheet" href="../css/globals.css">
</head>

<body>
<div class="d-flex flex-column justify-content-between" style="height: 100vh">
    <div>
        <?php
        require("vues/header.php")
        ?>

        <!-- =================================================================================== -->
        <!-- =================================================================================== -->
        <!-- =================================================================================== -->

        <div class="d-flex flex-row justify-content-center p-4 border-bottom">
            <form class="add-items d-flex" action="index.php?action=addPrivateTDL" method="post">
                <input type="text" name="namePrivateTDL" class="form-control todo-list-input" placeholder="Name" style="margin-right: 5px">
                <button type="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
            </form>
        </div>

        <div class="d-flex flex-column justify-content-center m-5 align-items-center">
            <h3>Private Lists</h3>
            <div class="d-flex flex-column-reverse m-5 align-items-center ">
                <?php
                if(count($listTDLPrivate) == 0){
                    echo '<p>No List</p>';
                } else {
                    foreach ($listTDLPrivate as $value){
                        require ("vues/todolist.php");
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- =================================================================================== -->
    <!-- =================================================================================== -->
    <!-- =================================================================================== -->


    <div>
        <?php
        require ("vues/pagination.php");
        require ("vues/footer.php")
        ?>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>