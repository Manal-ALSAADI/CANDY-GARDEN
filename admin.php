<?php include("menu.php"); ?>

<div class="row">
       <div class="col-12">

       Your are wellcom <?php if(isset($_SESSION["email"])) echo $_SESSION["email"]; ?>

       </div>
  </div>
     

<?php include("close-content.php"); ?>