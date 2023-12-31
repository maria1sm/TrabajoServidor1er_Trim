<?php
class Order {
    #atributos de tablas
    protected $order_id;
    protected $user_id;
    protected $order_date;

    //Ordered items id array
    protected $items;

    public function __construct($order_id, $user_id, $order_date){
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->order_date = $order_date;
        
        //assoc array: item(obj), type, quantity
        $this->items = [];
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function pushToData($data,$value) {
        $this->{$data}[] = $value;
    }
    
    public function __toString(){
        return $this->order_id." ".$this->user_id." ".$this->order_date;
    }

}