<?php include("menu.php"); ?>

<?php
$data;
if (isset($_GET['id'])) {
    $data = viewProductforEdit($_GET['id']);
} else {
    echo '<div class="row">
    <div class="col-10">
    <div class="alert alert-danger" role="alert">Please go back to product list and try again</div>
    </div>
    </div>
    ';
    include("close-content.php");
    return;
}
$msg = "";
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categoryId = $_POST['categoryId'];
    $img = null;
   
    if(strlen($_FILES['img']['tmp_name']) >0)
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));

    if ($name == "")
        $name = $data['name'];
    if ($price == "" || is_null($price))
        $price = $data['price'];
  
    if ($description == "")
        $description = $data['description'];
    if ($categoryId == "")
        $categoryId = $data['categoryId'];

    $msg = EditProduct($_GET['id'],$name, $description,$img, $price, $categoryId, $_SESSION['userId']);
    $data = viewProductforEdit($_GET['id']);
}

?>
 
<div class="row">
    <div class="col-1">
    </div>
    <div class="col-6">
        <?php echo $msg ?>
        <form class="mt-3"  method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Enter product name</label>
                <input type="text" value="<?php echo $data['name'] ?>" class="form-control" id="name" placeholder="enter product name " name="name">
            </div>

            <div class="form-group">
                <label for="price">Enter product price</label>
                <input type="text" value="<?php echo $data['price'] ?>" class="form-control" name="price" id="price" placeholder="Enter product price">
            </div>

            <div class="form-group">
                <label for="categoryId">Select product Category</label>
                <select class="form-control" id="categoryId" name="categoryId">
                    <?php getCategories("select * from category",$data['categoryId']) ?>
                </select>
            </div>
            <div class="form-group">
                <label for="categoryId">Enter product description</label>
                <textarea rows="7" class="form-control" placeholder="enter product description" name="description"><?php echo $data['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="img">Upload product image</label>
                <input type="file" class="form-control-file" id="img" name="img">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">update</button>
        </form>

    </div>
    <div class="col-3">
        <img class="mt-5" src="data:image/png;base64,<?php echo base64_encode($data['img']) ?>" width="260" height="260" alt="img" />
    </div>
</div>
</div>



<?php include("close-content.php"); ?>