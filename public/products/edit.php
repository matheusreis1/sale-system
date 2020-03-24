<?php

require_once "../../config/config.php";
use controller\ProductController;

$productController = new ProductController();

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing ID.');

$productController->edit();
$product = $productController->product;

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Update Product</h2>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <hr/>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="product['name']" value="<?php echo $product['name']; ?>" required="true">
        </div>
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="product['price']" value="<?php echo $product['price']; ?>" required="true">
        </div>
        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="product['description']" required="true"><?php echo $product['description']; ?></textarea>
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