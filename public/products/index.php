<?php

require_once "../../config/config.php";
use controller\ProductController;

$productController = new ProductController();

$products = $productController->products;

?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Products</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php">
                <i class="fa fa-plus"></i>
                New Product
            </a>
	    	<a class="btn btn-default" onclick="reload()">
                <i class="fa fa-refresh"></i>
                Refresh
            </a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th width="30%">Description</th>
		</tr>
	</thead>
	<tbody>

	<?php if ($products) : ?>

		<?php foreach ($products as $product) : ?>
			<tr>
				<td><?php echo $product['id']; ?></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['price']; ?></td>
				<td><?php echo $product['description']; ?></td>
				
				<td class="actions text-right">
					<a href="view.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-success">
						<i class="fa fa-eye"></i> 
						View
					</a>
					<a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-warning">
						<i class="fa fa-pencil"></i>
						Edit
					</a>
					<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" 
						data-target="#delete-modal" data-item="<?php echo $product['id']; ?>"
						data-title="Product">
						<i class="fa fa-trash"></i> Delete
					</a>
				</td>
			</tr>
		<?php endforeach; ?>

	<?php else: ?>
		<tr>
			<td colspan="6">No register found.</td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>

<?php include(PUBLICPATH."include/delete_modal.php"); ?>

<?php include(FOOTER_TEMPLATE); ?>