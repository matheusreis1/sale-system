<?php

require_once "../../config/config.php";
use controller\ProductController;

$productController = new ProductController();

if (isset($_GET['id'])) {
    $productController->delete($_GET['id']);
} else {
    die("ERROR: ID not defined.");
}