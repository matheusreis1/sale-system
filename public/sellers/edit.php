<?php

require_once "../../config/config.php";
use controller\SellerController;

$sellerController = new SellerController();

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing ID.');

$sellerController->edit();
$seller = $sellerController->seller;

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Update Seller</h2>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <hr/>
    <div class="row">

        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="seller[name]" value="<?php echo $seller['name']; ?>" required="true">
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