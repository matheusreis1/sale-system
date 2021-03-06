<?php

namespace database;

use database\Database;
use model\Seller;

class SellerSql {

    private $table;
    private $database;

    public function __construct() {
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
        $sellerArray = $seller->toArray($seller);

        $result = $this->database->save($sellerArray);

        if ($result) {
            $_SESSION['message'] = 'Seller added.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to add the seller.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function update($id, $seller) {
        $result = $this->database->update($id, $seller);

        if ($result) {
            $_SESSION['message'] = 'Seller updated.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to update the seller.';
            $_SESSION['type'] = 'danger';
        }
    }

    public function remove($id) {
        $result = $this->database->remove($id);

        if ($result) {
            $_SESSION['message'] = 'Seller deleted.';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Not possible to delete this seller.';
            $_SESSION['type'] = 'danger';
        }
    }

}