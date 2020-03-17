<?php

require_once(ABSPATH.'config.php');
include_once BASEURL."/model/Product.php";
include_once BASEURL."/database/ProductSql.php";

class ProductController {

    public $products;
    private $database;

    public function __construct() {
        $this->database = new ProductSql();
        $this->products = $this->list('product');
    }

    public function list($table) {
        return $this->database->find($table);
    }
}