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

}