<?php

class HashTable{
    private $arr = array();
    private $size = 10;
    public function __construct()
    {
        $this->arr = new SplFixedArray($this->size);
    }

    private function simpleHash($key){
        $len = strlen($key);
        $asciiTotal = 0;
        for($i = 0; $i < $len; $i++){
            $asciiTotal += ord($key[$i]);
        }
        return $asciiTotal % $this->size;
    }

    public function set($key,$value){
        $hash = $this->simpleHash($key);
        $this->arr[$hash] = $value;
        return true;
    }

    public function get($key){
        $hash = $this->simpleHash($key);
        return $this->arr[$hash];
    }    

    public function getList($size){
        return $this->arr;
    }

    public function editSize($size){
        $this->size = $size;

        $this->arr->setSize($size);
    }
}