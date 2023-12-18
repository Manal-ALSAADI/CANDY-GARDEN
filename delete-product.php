<?php include("menu.php"); ?>


<div class="row">
    <div class="col-1">
    </div>
    <div class="col-6">
        <?php
       
        if (isset($_GET['id'])) {
            echo deleteProduct($_GET['id']);
            echo '<a href="list-products.php">Go back to product List</a>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">Please go back to product list and try again
            <a href="list-products.php"> Click here</a>
            </div>';
        }
        
        ?>
    </div>
</div>
</div>



<?php include("close-content.php"); ?>