<?php

class Sale {

    private $id;
    private $seller_id;
    private $product_id;
    private $sale_time;

    public function __construct($seller_id, $product_id, $sale_time) {
        $this->seller_id = $seller_id;
        $this->product_id = $product_id;
        $this->sale_time = $sale_time;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSellerId() {
        return $this->seller_id;
    }

    public function setSellerId($seller_id) {
        $this->seller_id = $seller_id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function getSaleTime() {
        return $this->sale_time;
    }

    public function setSaleTime($sale_time) {
        $this->sale_time = $sale_time;
    }

}