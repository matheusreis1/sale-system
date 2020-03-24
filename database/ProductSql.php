<?php

require_once ABSPATH."database.php";
require_once BASEURL."/model/Product.php";
require_once "Database.php";

class ProductSql extends PDO {

    private $conn;
    private $table;
    private $database;

    public function __construct() {
        $database = new DatabaseConnection();
        $this->conn = $database->getConnection();
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
        $name = $product->getName();
        $price = $product->getPrice();
        $description = $product->getDescription();
        
        $stmt = $this->conn->prepare(
            "INSERT INTO ". $this->table .
            "(name, price, description)
            VALUES (:name, :price, :description)"
        );

        try {
            $stmt->execute(array(
                ":name" => $name,
                ":price" => $price,
                ":description" => $description,
            ));
    
            $_SESSION['message'] = 'Product added.';
            $_SESSION['type'] = 'success';
        } catch(Exception $e) {
            $_SESSION['message'] = 'Not possible to add the product.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function update($id, $product) {
        $name = $product["'name'"];
        $price = $product["'price'"];
        $description = $product["'description'"];

        $stmt = $this->conn->prepare(
            "UPDATE ". $this->table .
            " SET name = :name, price = :price, description = :description
            WHERE id = :id"
        );

        try {
            $result = $stmt->execute(array(
                ":id" => $id,
                ":name" => $name,
                ":price" => $price,
                ":description" => $description
            ));

            $_SESSION['message'] = 'Product updated.';
            $_SESSION['type'] = 'success';
        } catch(Exception $e) {
            $_SESSION['message'] = 'Not possible to update the product.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function remove($id) {
        $result = $this->database->remove($this->table, $id);

        if ($result) {
            $_SESSION['message'] = 'Product deleted.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to delete this product.';
            $_SESSION['type'] = 'danger';
        }
    }
}