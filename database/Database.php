<?php

require_once ABSPATH."database.php";

class Database extends PDO {

    private $conn;
    private $table;

    public function __construct($table) {
        $database = new DatabaseConnection();
        $this->conn = $database->getConnection();
        $this->table = $table;
    }

    public function find($query, $id = null) {
        $found = null;

        try {
            if ($id) {
                $stmt = $this->conn->prepare(
                    $query.
                    " WHERE ".$this->table.".id = :id
                    ORDER BY ".$this->table.".id"
                );

                $result = $stmt->execute(array(
                    ":id" => $id
                ));

                if ($result) {
                    $found = $stmt->fetch(PDO::FETCH_ASSOC);
                }
    
            } else {
                $stmt = $this->conn->prepare(
                    $query.
                    " ORDER BY ".$this->table.".id"
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

    public function remove($table, $id) {
        $result = false;

        try {
            $stmt = $this->conn->prepare(
                "DELETE FROM ". $table ." WHERE id = :id"
            );
            $stmt->bindParam(':id', $id);

            $result = $stmt->execute();
        } catch(Exception $e) {
            $result = false;
        }

        return $result;
    }
}