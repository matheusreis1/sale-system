<?php

require_once BASEURL."/model/Sale.php";
require_once BASEURL."/database/SaleSql.php";

class SaleController {

    public $sales;
    public $sale;
    private $database;

    public function __construct() {
        $this->database = new SaleSql();
        $this->sales = $this->list();
    }

    public function list() {
        return $this->database->find();
    }

    public function view($id) {
        $this->sale = $this->database->find($id);
    }

}