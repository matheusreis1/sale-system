<?php 

require_once "../../config/config.php";
require_once BASEURL."controller/ProductController.php";

$productController = new ProductController();
$productController->add();

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>New Product</h2>

<form action="add.php" method="post">
    <hr/>
    <div class="row">

        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="product['name']" required="true">
        </div>
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="product['price']" required="true">
        </div>
        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="product['description']" required="true"></textarea>
        </div>
    </div>
   
    <div id="actions" class="row">

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Save</button>
            <a onclick="back()" class="btn btn-default">Cancel</a>
        </div>

    </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>