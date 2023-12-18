<?php include("menu.php"); ?>

<?php
$msg = "";
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categoryId = $_POST['categoryId'];
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
   
    if ($name == "" || $price == "" ||is_null($description) ||  strlen($img) <0 || is_null($categoryId)) {
        $msg = '<div class="alert alert-danger" role="alert"> All fields is required</div>';
    } else {
       
       

        $msg = addProduct($name, $description, $img, $price, $categoryId, $_SESSION['userId']);
    }
}
?>

<div class="row">
    <div class="col-1">
    </div>
    <div class="col-6">
    <?php echo $msg ?>
        <form class="mt-5" action="add-product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Enter product name</label>
                <input type="text" class="form-control" id="name" placeholder="enter product name " name="name">
            </div>

            <div class="form-group">
                <label for="price">Enter product price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Enter product price">
            </div>

            <div class="form-group">
                <label for="categoryId">Select product Category</label>
                <select class="form-control" id="categoryId" name="categoryId">
                    <?php getCategories("select * from category") ?>
                </select>
            </div>
            <div class="form-group">
                <label for="categoryId">Enter product description</label>
                <textarea rows="7" class="form-control" placeholder="enter product description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="img">Upload product image</label>
                <input type="file" class="form-control-file" id="img" name="img">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
        
    </div>
    <div class="col-3">
    </div>
</div>
</div>



<?php include("close-content.php"); ?>