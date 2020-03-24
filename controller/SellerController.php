<?php

require_once BASEURL."/database/SellerSql.php";

use model\Seller;

class SellerController {

    public $sellers;
    public $seller;
    private $database;

    public function __construct() {
        $this->database = new SellerSql();
        $this->sellers = $this->list();
    }

    public function list() {
        return $this->database->find();
    }

    public function add() {
        if (!empty($_POST['seller'])) {
            $name = $_POST['seller']["'name'"];

            $seller = new Seller($name);

            $this->database->save($seller);
            header('location: index.php');
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if (isset($_POST['seller'])) {
                $seller = $_POST['seller'];

                $this->database->update($id, $seller);
                header('location: index.php');
            } else {
                $this->seller = $this->database->find($id);
            }
        } else {
            header('location: index.php');
        }
    }

    public function view($id = null) {
        $this->seller = $this->database->find($id);
    }

    public function delete($id) {
        $this->product = $this->database->remove($id);
        header('location: index.php');
    }

}