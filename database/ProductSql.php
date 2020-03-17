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
        var_dump($product);
        die;
        $name = $product->getName();
        $price = $product->getPrice();
        $description = $product->getDescription();

    }
}