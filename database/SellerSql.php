<?php

require_once ABSPATH."database.php";
require_once BASEURL."model/Seller.php";
require_once "Database.php";

class SellerSql extends PDO {

    private $conn;
    private $table;

    public function __construct() {
        $database = new DatabaseConnection();
        $this->conn = $database->getConnection();
        $this->table = 'seller';
        $this->database = new Database($this->table);
    }

    public function find($id = null) {
        $found = null;

        if ($id) {
            $found = $this->database->find("SELECT * FROM $this->table", $id);
        } else {
            $found = $this->database->find("SELECT * FROM $this->table");
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

    public function update($id, $seller) {
        $name = $seller["'name'"];

        $stmt = $this->conn->prepare(
            "UPDATE ". $this->table .
            " SET name = :name
            WHERE id = :id"
        );

        try {
            $result = $stmt->execute(array(
               ":name"=> $name,
               ":id" => $id 
            ));

            $_SESSION['message'] = 'Seller updated.';
            $_SESSION['type'] = 'success';
        } catch (Exception $e) {
            $_SESSION['message'] = 'Not possible to update the seller.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function remove($id) {
        $result = $this->database->remove($this->table, $id);

        if ($result) {
            $_SESSION['message'] = 'Seller deleted.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to delete this seller.';
            $_SESSION['type'] = 'danger';
        }
    }

}