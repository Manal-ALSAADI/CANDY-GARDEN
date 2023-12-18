<?php include("menu.php"); ?>
<?php
$data;
if (isset($_GET['id'])) {
  $data = getProductforView($_GET['id']);
} else {
  echo '<div class="row">
    <div class="col-10">
    <div class="alert alert-danger" role="alert">Please go back to  
    <a href="list-products.php"> product list</a> and try again
    </div>
    </div>
    </div>
    ';
  include("close-content.php");
  return;
}
?>
<div class="row">
  <div class="col-12">
    <table class="table">
      <tbody>
        <tr>
          <th scope="col">#</th>
          <td><?php echo $data['pId'];?> </th>
        </tr>
        <tr>
          <th scope="col">product name</th>
          <td><?php echo $data['pname'];?> </th>
        </tr>
        <tr>
          <th scope="col">price</th>
          <td><?php echo $data['price'];?>RS </td>
        </tr>
        <tr>
          <th scope="col">category</th>
          <td><?php echo $data['cname'];?> </td>
        </tr>
        <tr>
          <th  scope="col" colspan="3">description</th>
        </tr>
        <tr>
          <td colspan="2" style="border: none;"><?php echo $data['description'];?> </td>
        </tr>
        <tr>
          <td colspan="2">
          <img class="mt-5" src="data:image/png;base64,<?php echo base64_encode($data['img']) ?>" width="260" height="260" alt="img" />
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
 


<?php include("close-content.php"); ?>