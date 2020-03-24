<?php 

require_once "../../config/config.php";
require_once BASEURL."controller/SellerController.php";

$sellerController = new SellerController();
$sellerController->add();

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>New Seller</h2>

<form action="add.php" method="post">
    <hr/>
    <div class="row">

        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="seller['name']" required="true">
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