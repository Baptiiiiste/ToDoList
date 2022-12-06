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

<div class="d-flex flex-column align-items-center mt-5">
    <form class="w-25" method="POST">
        <div class="form-group mt-3">
            <label for="exampleInputLogin1">Login</label>
            <input type="text" class="form-control" name="pseudo" id="exampleInputLogin1" placeholder="Enter login">
        </div>
        <div class="form-group mt-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <input type="hidden" name="action" value="loginForm">
    </form>
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
