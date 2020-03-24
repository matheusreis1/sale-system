<?php 

require_once "../../config/config.php";
include_once BASEURL."controller/SaleController.php";
include_once BASEURL."controller/SellerController.php";
include_once BASEURL."controller/ProductController.php";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing ID.');

$saleController = new SaleController();
$saleController->edit();
$sale = $saleController->sale;

$sellerController = new SellerController();
$sellers = $sellerController->sellers;

$productController = new ProductController();
$products = $productController->products;

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>New Sale</h2>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <hr/>
    <div class="row">

        <div class="form-group col-md-3">
            <label for="product">Product</label>
            <?php
                echo "<select class='form-control' name='product_id'>";
                foreach ($products as $product) {
                    if ($sale['product_id'] === $product['id']) {
                        echo "<option value='{$product['id']}' selected='true'>{$product['name']}</option>";
                    } else {
                        echo "<option value='{$product['id']}'>{$product['name']}</option>";
                    }
                }
                echo "</select>";
            ?>
        </div>

        <div class="form-group col-md-3">
            <label for="seller">Seller</label>
            <?php
                echo "<select class='form-control' name='seller_id'>";
                foreach ($sellers as $seller) {
                    if ($sale['seller_id'] === $seller['id']) {
                        echo "<option value='{$seller['id']}' selected='true'>{$seller['name']}</option>";
                    } else {
                        echo "<option value='{$seller['id']}'>{$seller['name']}</option>";
                    }
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