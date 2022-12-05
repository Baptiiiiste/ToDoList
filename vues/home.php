<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUDUM List</title>
    <link rel="stylesheet" href="../css/globals.css">
</head>

<body>
<?php
require("vues/header.php")
?>

<!-- =================================================================================== -->
<!-- =================================================================================== -->
<!-- =================================================================================== -->

<div class="d-flex flex-row justify-content-between" style="height: 100%">
    <div class="d-flex flex-column w-50 m-5 align-items-center">
        <h3> Todo List Public</h3>
        <?php
        require ("vues/public.php");
        ?>
    </div>
    <div class="bg-black" style="width: 1px">

    </div>
    <div class="d-flex flex-column w-50 m-5 align-items-center">
        <h3> Todo List Private</h3>
        <?php
        require ("vues/private.php");
        ?>
    </div>
</div>

<!-- =================================================================================== -->
<!-- =================================================================================== -->
<!-- =================================================================================== -->


<?php
require("vues/footer.php")
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>