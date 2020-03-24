<?php 

require_once "../../config/config.php";
include_once BASEURL."controller/SaleController.php";
include_once BASEURL."controller/SellerController.php";
include_once BASEURL."controller/ProductController.php";

$saleController = new SaleController();
$saleController->add();

$sellerController = new SellerController();
$sellers = $sellerController->sellers;

$productController = new ProductController();
$products = $productController->products;

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>New Sale</h2>

<form action="add.php" method="post">
    <hr/>
    <div class="row">

        <div class="form-group col-md-3">
            <label for="product">Product</label>
            <?php
                echo "<select class='form-control' name='product_id'>";
                foreach ($products as $product) {
                    echo "<option value='{$product['id']}'>{$product['name']}</option>";
                }
                echo "</select>";
            ?>
        </div>

        <div class="form-group col-md-3">
            <label for="seller">Seller</label>
            <?php
                echo "<select class='form-control' name='seller_id'>";
                foreach ($sellers as $seller) {
                    echo "<option value='{$seller['id']}'>{$seller['name']}</option>";
                }
                echo "</select>";
            ?>
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