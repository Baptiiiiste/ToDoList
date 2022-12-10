<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="assets/img/logo.png" class="bi me-2" width="40" height="32">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 text-white">Public</a></li>
                <li><a href="index.php?action=private" class="nav-link px-2 text-white">Private</a></li>
            </ul>
            <div class="text-end">
                <?php

                    $mdlUser = new ModelUser();

                    if($mdlUser->isUser() == null){
                        echo '<a href="index.php?action=login" class="btn btn-warning" style="background-color: rgb(47, 155, 206); border-color: rgb(47, 155, 206);">Log in</a>';
                        echo '<a href="index.php?action=signin" class="btn btn-outline-light" style="margin-left: 5px">Sign in</a>';
                    }else{
                        echo '<a href="index.php?action=disconnect" class="btn btn-outline-light">Log out</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</header>