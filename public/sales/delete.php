<?php

require_once "../../config/config.php";
require_once BASEURL."controller/SaleController.php";

$saleController = new SaleController();

if (isset($_GET['id'])) {
    $saleController->delete($_GET['id']);
} else {
    die("ERROR: ID not defined.");
}