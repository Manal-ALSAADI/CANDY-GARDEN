<?php
session_start();
if (!isset($_SESSION["userId"])) {
	header("Location: login.php");
	exit();
}
 
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$page = explode('/', $path);
$pageName = str_replace(".php",'',$page[2]);
$pages =array("admin","list-requests", "list-products","add-product");
 
?>
<?php include("header.php"); ?>
<div class="wrapper">
    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="admin.php" class="list-group-item list-group-item-action <?php if($pageName==$pages[0]) echo 'active'; ?>">
                      Dashboard
                    </a>
                    <a href="add-product.php" class="list-group-item list-group-item-action <?php if($pageName==$pages[3]) echo 'active'; ?>">Add product</a>
                    <a href="list-products.php" class="list-group-item list-group-item-action <?php if($pageName==$pages[2]) echo 'active'; ?>">view products</a>
                    <a href="list-requests.php" class="list-group-item list-group-item-action <?php if($pageName==$pages[1]) echo 'active'; ?>">View requests</a>
                    
                   
                    <a href="logout.php" class="list-group-item list-group-item-action">logout</a>
                </div>
            </div>
            <div class="col-10">
                <!-- Page Content -->
                <div id="content" class="pt-5">
                        <div class="container-fluid bg-light">