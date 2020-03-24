<?php

namespace config;

class DatabaseConnection {

    public $conn;

    public function getConnection() {
        $this->conn = null;
 
        try{
            $this->conn = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        } catch(\PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}