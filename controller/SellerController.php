<?php

require_once BASEURL."/model/Seller.php";
require_once BASEURL."/database/SellerSql.php";

class SellerController {

    public $sellers;
    public $seller;
    private $database;

    public function __construct() {
        $this->database = new SellerSql();
        $this->sellers = $this->list();
    }

    public function list() {
        return $this->database->find();
    }

    public function view($id = null) {
        $this->seller = $this->database->find($id);
    }

}