<?php 
require_once 'Config.php';

class Product{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($id, $name, $description, $price){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    
    public function setName($name){
         $this->name = $name;
    }

    public function getDescription(){
        return $this->description;
    }

    
    public function setDescription($description){
        $this->description = $description;
   }

    public function getPrice(){
        return $this->price;
    }

    
    public function setPrice($price){
        $this->price = $price;
   }

    // public function create(){
    //     $query = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
    //     $conn = $this->connect();
    //     $stmt = $conn->prepare($query);
    //     $name = $this->getName();
    //     $description = $this->getDescription();
    //     $price = $this->getPrice();
    //     $stmt->bind_param("ssd", $name, $description, $price);
    //     $stmt->execute();
    //     $stmt->close();
    //     $conn->close();
    // }
}

?>