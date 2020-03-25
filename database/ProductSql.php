<?php

namespace database;

use database\Database;
use model\Product;

class ProductSql {

    private $table;
    private $database;

    public function __construct() {
        $this->table = 'product';
        $this->database = new Database($this->table);
    }

    public function find($id = null) {
        $found = null;

        if ($id) {
            $found = $this->database->find("SELECT * FROM product", $id);
        } else {
            $found = $this->database->find("SELECT * FROM product");
        }

        return $found;
    }

    public function save(Product $product) {
        $productArray = $product->toArray($product);

        $result = $this->database->save($productArray);

        if ($result) {
            $_SESSION['message'] = 'Product added.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to add the product.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function update($id, $product) {
        $result = $this->database->update($id, $product);

        if ($result) {
            $_SESSION['message'] = 'Product updated.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to update the product.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function remove($id) {
        $result = $this->database->remove($id);

        if ($result) {
            $_SESSION['message'] = 'Product deleted.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to delete this product.';
            $_SESSION['type'] = 'danger';
        }
    }
}