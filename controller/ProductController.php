<?php

namespace controller;

use database\ProductSql;
use model\Product;

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
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if (isset($_POST['product'])) {
                $product = $_POST['product'];

                $this->database->update($id, $product);
                header('location: index.php');
            } else {
                $this->product = $this->database->find($id);
            }
        } else {
            header('location: index.php');
        }
    }

    public function view($id = null) {
        $this->product = $this->database->find($id);
    }

    public function delete($id = null) {
        $this->product = $this->database->remove($id);
        header('location: index.php');
    }
}