<?php

use config\DatabaseConnection;

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

    public function save($data) {
        $result = false;
        $columns = null;
        $values = null;

        foreach ($data as $key => $value) {
            $columns .= "$key,";
            $values .= ":$key,";
        }

        $columns = rtrim($columns, ',');
        $values = rtrim($values, ',');
 
        $stmt = $this->conn->prepare(
            "INSERT INTO ". $this->table .
            "($columns) VALUES ($values)"
        );

        foreach ($data as $key => $value) {
            $stmt->bindParam(":$key", $value);
        }

        try {
            $result = $stmt->execute();
            
        } catch (Exception $e) {
            $result = false;
        }

        return $result;
    }

    public function remove($table, $id) {
        $result = false;

        try {
            $stmt = $this->conn->prepare(
                "DELETE FROM ". $table ."
                 WHERE ".$this->table.".id = :id"
            );
            $stmt->bindParam(':id', $id);

            $result = $stmt->execute();
        } catch(Exception $e) {
            $result = false;
        }

        return $result;
    }
}