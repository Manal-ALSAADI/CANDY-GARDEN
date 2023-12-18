<?php include("menu.php"); ?>

<form class="form-inline" method="POST">
  <input type="text" name="search" class="form-control mb-2 mr-sm-6 mr-3" placeholder="Search ...">
  <button type="submit" class="btn btn-primary mb-2">Search</button>
</form>

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">number of people</th>
                    <th scope="col">Table code</th>
                </tr>
            </thead>
            <tbody>
               <?php 
              
               if(isset($_POST["search"])){
                 listRequests(5,$_POST["search"]); 
               }
                else
              listRequests(5);
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <?php 
              
              if(isset($_POST["search"])){
                pagenationRequest('tables', 'list-requests', 1, 5,$_POST["search"]); 
              }
               else
               pagenationRequest('tables', 'list-requests', 1, 5);
               ?>
                
            </ul>
        </nav>
    </div>
</div>

<?php include("close-content.php"); ?>