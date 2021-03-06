<?php

namespace controller;

use database\SaleSql;
use model\Sale;

class SaleController {

    public $sales;
    public $sale;
    private $database;

    public function __construct() {
        $this->database = new SaleSql();
        $this->sales = $this->list();
    }

    public function list() {
        return $this->database->find();
    }

    public function add() {
        if(!empty($_POST['product_id']) && !empty($_POST['seller_id'])) {
            $seller_id = $_POST['seller_id'];
            $product_id = $_POST['product_id'];

            $sale = new Sale($seller_id, $product_id);

            $this->database->save($sale);
            header('location: index.php');
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if (isset($_POST['product_id']) && isset($_POST['seller_id'])) {
                $this->database->update($id, $_POST);
                header('location: index.php');
            } else {
                $this->sale = $this->database->find($id);
            }
        } else {
            header('location: index.php');
        }
    }

    public function view($id) {
        $this->sale = $this->database->find($id);
    }

    public function delete($id) {
        $this->sale = $this->database->remove($id);
        header('location: index.php');
    }

}