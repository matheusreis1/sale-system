<?php

require_once "../../config/config.php";
use controller\SaleController;

$saleController = new SaleController();

if (isset($_GET['id'])) {
    $saleController->delete($_GET['id']);
} else {
    die("ERROR: ID not defined.");
}