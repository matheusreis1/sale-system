<?php

include_once ABSPATH."database.php";

class ProductSql extends PDO {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function find($table = null, $id = null) {
        $found = null;

        try {
            if ($id) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $table . " WHERE id = :id");

                $result = $stmt->execute(array(
                    ":id" => $id
                ));

                if ($result) {
                    $found = $stmt->fetch(PDO::FETCH_ASSOC);
                }
    
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM " . $table);
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