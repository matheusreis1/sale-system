<?php

require_once ABSPATH."database.php";
require_once BASEURL."model/Seller.php";

class SellerSql extends PDO {

    private $conn;
    private $table;

    public function __construct() {
        $database = new Database;
        $this->conn = $database->getConnection();
        $this->table = 'seller';
    }

    public function find($id = null) {
        $found = null;

        try {
            if ($id) {
                $stmt = $this->conn->prepare(
                    "SELECT * FROM " . $this->table . 
                    " WHERE id = :id"
                );
                $stmt->bindParam('id', $id);

                $result = $stmt->execute();

                if ($result) {
                    $found = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            } else {
                $stmt = $this->conn->prepare(
                    "SELECT * FROM ". $this->table
                );
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

    public function save(Seller $seller) {
        $name = $seller->getName();

        $stmt = $this->conn->prepare(
            "INSERT INTO ". $this->table .
            "(name) VALUES (:name)"
        );

        try {
            $stmt->execute(array(
                ":name" => $name
            ));
    
            $_SESSION['message'] = 'Seller added.';
            $_SESSION['type'] = 'success';
        } catch (Exception $e) {
            $_SESSION['message'] = 'Not possible to add the seller.';
            $_SESSION['type'] = 'danger';
        }
    }

}