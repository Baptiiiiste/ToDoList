<div class="d-flex flex-row justify-content-center">
    <nav>
        <ul class="pagination">
            <?php
            if($page != 1){
                echo '<li class="page-item"><a class="page-link" href="index.php?page=1">First</a></li>';
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
            }
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.$page.'">'.$page.'</a></li>';
            if($page != $nbPages && $nbPages != 0){
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$nbPages.'">Last</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>
