<?php

require_once BASEURL."/model/Seller.php";
require_once BASEURL."/database/SellerSql.php";

class SellerController {

    public $sellers;
    private $database;

    public function __construct() {
        $this->database = new SellerSql();
        $this->sellers = $this->list();
    }

    public function list() {
        return $this->database->find();
    }

}