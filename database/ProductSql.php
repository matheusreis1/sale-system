<?php

include_once ABSPATH."database.php";
include_once BASEURL."/model/Product.php";

class ProductSql extends PDO {

    private $conn;
    private $table;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->table = 'product';
    }

    public function find($id = null) {
        $found = null;

        try {
            if ($id) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");

                $result = $stmt->execute(array(
                    ":id" => $id
                ));

                if ($result) {
                    $found = $stmt->fetch(PDO::FETCH_ASSOC);
                }
    
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
                $result = $stmt->execute();

                if ($result) {
                    $found = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        } catch (Exception $e) {
            $_SESSION['message'] = $e->GetMessage();
            $_SESSION['type'] = 'danger';
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
}