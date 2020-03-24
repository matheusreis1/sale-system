<?php

namespace database;

use database\Database;
use config\DatabaseConnection;
use model\Sale;

class SaleSql {

    private $conn;
    private $table;

    public function __construct() {
        $database = new DatabaseConnection();
        $this->conn = $database->getConnection();
        $this->table = 'sale';
        $this->database = new Database($this->table);
    }

    public function find($id = null) {
        $found = null;

        if ($id) {
            $found = $this->database->find(
                "SELECT sale.*, product.name as product_name, seller.name as seller_name, DATE_FORMAT(sale.sale_time,'%d/%m/%Y') AS sale_time 
                FROM sale 
                INNER JOIN product ON (product.id = sale.product_id) 
                INNER JOIN seller ON (seller.id = sale.seller_id)", $id
            );
        } else {
            $found = $this->database->find(
                "SELECT sale.*, product.name as product_name, seller.name as seller_name, DATE_FORMAT(sale.sale_time,'%d/%m/%Y') AS sale_time 
                FROM sale 
                INNER JOIN product ON (product.id = sale.product_id) 
                INNER JOIN seller ON (seller.id = sale.seller_id)"
            );
        }

        return $found;
    }

    public function save(Sale $sale) {
        $seller_id = $sale->getSellerId();
        $product_id = $sale->getProductId();

        $stmt = $this->conn->prepare(
            "INSERT INTO ". $this->table . "(seller_id, product_id) VALUES (:seller_id, :product_id)"
        );

        try {
            $result = $stmt->execute(array(
                ':seller_id' => $seller_id,
                ':product_id' => $product_id
            ));

            if ($result) {
                $_SESSION['message'] = 'Sale added.';
                $_SESSION['type'] = 'success';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = 'Not possible to add the sale.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function update($id, $sale) {
        $seller_id = $sale["seller_id"];
        $product_id = $sale["product_id"];
        
        $stmt = $this->conn->prepare(
            "UPDATE ". $this->table .
            " SET seller_id = :seller_id, product_id = :product_id
            WHERE id = :id"
        );

        try {
            $result = $stmt->execute(array(
                ":id" => $id,
                ":seller_id" => $seller_id,
                ":product_id" => $product_id
            ));

            if ($result) {
                $_SESSION['message'] = 'Sale updated.';
                $_SESSION['type'] = 'success';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = 'Not possible to update the sale.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function remove($id) {
        $result = $this->database->remove($this->table, $id);

        if ($result) {
            $_SESSION['message'] = 'Sale deleted.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to delete this sale.';
            $_SESSION['type'] = 'danger';
        }
    }

}