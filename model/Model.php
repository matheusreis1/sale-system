<?php

namespace model;

class Model {

    public function toArray($data) {
        if (is_array($data) || is_object($data))
        {
            $result = array();
            foreach ($data as $key => $value)
            {
                $result[$key] = $this->toArray($value);
            }

            return $result;
        }
        return $data;
    }
}