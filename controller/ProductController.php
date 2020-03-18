<?php

require_once(ABSPATH.'config.php');
include_once BASEURL."/model/Product.php";
include_once BASEURL."/database/ProductSql.php";

class ProductController {

    public $products;
    public $product;
    private $database;

    public function __construct() {
        $this->database = new ProductSql();
        $this->products = $this->list();
    }

    public function list() {
        return $this->database->find();
    }

    public function add() {
        if (!empty($_POST['product'])) {
            $name = $_POST['product']["'name'"];
            $description = $_POST['product']["'description'"];
            $price = $_POST['product']["'price'"];

            $product = new Product($name, $description, $price);

            $this->database->save($product);
            header('location: index.php');
        }
    }

    public function edit() {

    }

    public function view($id = null) {
        $this->product = $this->database->find($id);
    }

    public function delete($id = null) {

    }
}