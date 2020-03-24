<?php

namespace model;
use model\Model;

class Sale extends Model {

    private $id;
    protected $seller_id;
    protected $product_id;
    private $sale_time;

    public function __construct($seller_id, $product_id) {
        $this->seller_id = $seller_id;
        $this->product_id = $product_id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSellerId() {
        return intval($this->seller_id);
    }

    public function setSellerId($seller_id) {
        $this->seller_id = $seller_id;
    }

    public function getProductId() {
        return intval($this->product_id);
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

    public function toArray($data) {
        if (is_array($data) || is_object($data))
        {
            $result = array();
            
            $result['product_id'] = $this->getProductId();
            $result['seller_id'] = $this->getSellerId();

            return $result;
        }
        return $data;
    }
}