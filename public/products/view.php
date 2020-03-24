<?php

require_once "../../config/config.php";
use controller\ProductController;

$productController = new ProductController();

$productController->view($_GET['id']);
$product = $productController->product;

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Product: #<?php echo $product['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Name:</dt>
	<dd><?php echo $product['name']; ?></dd>

    <dt>Price:</dt>
	<dd><?php echo $product['price']; ?></dd>

    <dt>Description:</dt>
	<dd><?php echo $product['description']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Edit</a>
	  <a href="index.php" class="btn btn-default">Back</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>