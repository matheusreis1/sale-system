<?php

require_once ABSPATH."database.php";
require_once BASEURL."/model/Sale.php";

class SaleSql extends PDO {

    private $conn;
    private $table;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->table = 'sale';
    }

    public function find($id = null) {
        $found = null;

        try {
            if ($id) {
                $stmt = $this->conn->prepare(
                    "SELECT sale.*, product.name as product_name, seller.name as seller_name 
                    FROM sale 
                    INNER JOIN product ON (product.id = sale.product_id) 
                    INNER JOIN seller ON (seller.id = sale.seller_id) 
                    WHERE sale.id = :id"
                );
                $stmt->bindParam(':id', $id);
                $result = $stmt->execute();

                if ($result) {
                    $found = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            } else {
                $stmt = $this->conn->prepare(
                    "SELECT sale.*, product.name as product_name, seller.name as seller_name 
                    FROM sale 
                    INNER JOIN product ON (product.id = sale.product_id) 
                    INNER JOIN seller ON (seller.id = sale.seller_id)"
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