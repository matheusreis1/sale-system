<?php

require_once "../../config/config.php";
require_once BASEURL."controller/ProductController.php";

$productController = new ProductController();

if (isset($_GET['id'])) {
    $productController->delete($_GET['id']);
} else {
    die("ERROR: ID not defined.");
}