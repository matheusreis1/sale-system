<?php

require_once "../../config/config.php";
use controller\SaleController;

$saleController = new SaleController();

$sales = $saleController->sales;

?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Sales</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php">
                <i class="fa fa-plus"></i>
                New Sale
            </a>
	    	<a class="btn btn-default" href="index.php">
                <i class="fa fa-refresh"></i>
                Update
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
			<th width="30%">Product</th>
			<th width="30%">Seller</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>

	<?php if ($sales) : ?>
		
		<?php foreach ($sales as $sale) : ?>
			<tr>
				<td><?php echo $sale['id']; ?></td>
				<td><?php echo $sale['product_name']; ?></td>
				<td><?php echo $sale['seller_name']; ?></td>
				<td><?php echo $sale['sale_time']; ?></td>

				<td class="actions text-right">
					<a href="view.php?id=<?php echo $sale['id']; ?>" class="btn btn-sm btn-success">
						<i class="fa fa-eye"></i> 
						View
					</a>
					<a href="edit.php?id=<?php echo $sale['id']; ?>" class="btn btn-sm btn-warning">
						<i class="fa fa-pencil"></i>
						Edit
					</a>
					<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" 
						data-target="#delete-modal" data-item="<?php echo $sale['id']; ?>"
						data-title="Sale">
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