<?php

include_once ABSPATH."database.php";
include_once ABSPATH."/model/Seller.php";

class SellerSql extends PDO {

    private $conn;
    private $table;

    public function __construct() {
        $database = new Database;
        $this->conn = $database->getConnection();
        $this->table = 'selller';
    }

}