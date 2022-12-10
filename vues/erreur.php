<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/globals.css">
</head>

<body>

<div class="d-flex flex-column justify-content-between" style="height: 100vh">
    <?php
    require("vues/header.php")
    ?>

    <!-- =================================================================================== -->
    <!-- =================================================================================== -->
    <!-- =================================================================================== -->

    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2>An error has occurred ! </h2>
        <?php
        foreach ($TabVueEreur as $erreur){
            echo '<h3 class="display-2 fw-bold">'.$erreur.'</h3>';
        }
        ?>
        <a href="index.php" class="btn btn-primary stretched-link mt-3">Back Home</a>
    </div>

    <!-- =================================================================================== -->
    <!-- =================================================================================== -->
    <!-- =================================================================================== -->

    <?php
    require("vues/footer.php")
    ?>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>