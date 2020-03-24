<?php

require_once "../../config/config.php";
use controller\SellerController;

$sellerController = new SellerController();

if (isset($_GET['id'])) {
    $sellerController->delete($_GET['id']);
} else {
    die("ERROR: ID not defined.");
}