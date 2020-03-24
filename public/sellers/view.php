<?php

require_once "../../config/config.php";
use controller\SellerController;

$sellerController = new SellerController();

$sellerController->view($_GET['id']);
$seller = $sellerController->seller;

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Seller: #<?php echo $seller['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Name:</dt>
	<dd><?php echo $seller['name']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $seller['id']; ?>" class="btn btn-primary">Edit</a>
	  <a onclick="back()" class="btn btn-default">Back</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>