<?php
require_once("../model/Item.php");
class Product extends Item{
    #atributos de tablas
    /*protected $product_id;
    protected $pro_name;
    protected $pro_description;
    protected $price;
    protected $stock;
    protected $image;*/
    protected $category_id;
    protected $stock;
    //static $type = 1;

    /*public function __construct($product_id, $pro_name, $pro_description, $price, $stock, $image, $category_id){
        $this->product_id = $product_id;
        $this->pro_name = $pro_name;
        $this->pro_description = $pro_description;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
        $this->category_id = $category_id;
    }*/
    public function __construct($id, $name, $description, $price, $stock, $image, $category_id) {
        // Call the parent constructor with type 1 (product)
        parent::__construct(1,$id, $name, $description, $price, $image);
        $this->stock = $stock;
        $this->category_id = $category_id;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function __toString(){
        return parent::__toString()." ".$this->stock." ".$this->category_id;
    }

    public function pushToData($data,$value) {
        $this->{$data}[] = $value;
    }

    public static function compareByPriceAsc($a, $b) {
        return $a->price - $b->price;
    }
    public static function compareByPriceDesc($a, $b) {
        return $b->price - $a->price;
    }
    public static function compareByNameAsc($a, $b) {
        return strcmp($a->name , $b->name);
    }
    public static function compareByNameDesc($a, $b) {
        return strcmp($b->name , $a->name);
    }
/*
    public static function compareByIdDescending($o1, $o2) {
        if ($o1->id === $o2->id) {
            return 0;
        }
        return ($o2->getId() - $o1->getId()) ? -1 : 1;
    }*/

}
?>