<?php

require_once "../../config/config.php";
require_once BASEURL."controller/SellerController.php";

$sellerController = new SellerController();

if (isset($_GET['id'])) {
    $sellerController->delete($_GET['id']);
} else {
    die("ERROR: ID not defined.");
}