<?php

require_once "../../config/config.php";
use controller\SaleController;

$saleController = new SaleController();

$saleController->view($_GET['id']);
$sale = $saleController->sale;

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Sale: #<?php echo $sale['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Product:</dt>
	<dd><?php echo $sale['product_name']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Seller:</dt>
	<dd><?php echo $sale['seller_name']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Date:</dt>
	<dd><?php echo $sale['sale_time']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $sale['id']; ?>" class="btn btn-primary">Edit</a>
	  <a href="index.php" class="btn btn-default">Back</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>