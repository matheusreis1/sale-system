<?php

namespace database;
use config\DatabaseConnection;

class Database {

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
                    $found = $stmt->fetch(\PDO::FETCH_ASSOC);
                }
    
            } else {
                $stmt = $this->conn->prepare(
                    $query.
                    " ORDER BY ".$this->table.".id"
                );
                $result = $stmt->execute();

                if ($result) {
                    $found = $stmt->fetchAll(\PDO::FETCH_ASSOC);
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
        $paramArray = array();

        foreach ($data as $key => $value) {
            $columns .= "$key,";
            $values .= "?,";
            array_push($paramArray, $value);
        }

        $columns = rtrim($columns, ',');
        $values = rtrim($values, ',');

        $stmt = $this->conn->prepare(
            "INSERT INTO ". $this->table .
            "($columns) VALUES ($values)"
        );

        try {
            $result = $stmt->execute($paramArray);
        } catch (Exception $e) {
            $result = false;
        }

        return $result;
    }

    public function update($id, $data) {
        $result = false;
        $columns = null;
        $values = null;

        foreach ($data as $key => $value) {
            $columns .= "$key=:$key,";
        }

        $columns = rtrim($columns, ',');
        $values = rtrim($values, ',');

        $stmt = $this->conn->prepare(
            "UPDATE ". $this->table .
            " SET $columns 
            WHERE id = :id"
        );
        $data['id'] = $id;

        try {
            $result = $stmt->execute($data);
        } catch (Exception $e) {
            $result = false;
        }

        return $result;
    }

    public function remove($id) {
        $result = false;

        try {
            $stmt = $this->conn->prepare(
                "DELETE FROM ". $this->table ."
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