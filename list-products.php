<?php include("menu.php"); ?>

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">product name</th>
                    <th scope="col">price</th>
                    <th scope="col">category</th>
                    <th scope="col" colspan="3">action</th>
                </tr>
            </thead>
            <tbody>
                <?php listProduct(5); ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php pagenationRequest('product', 'list-products', 1, 5); ?>
            </ul>
        </nav>
    </div>
</div>


<?php include("close-content.php"); ?>