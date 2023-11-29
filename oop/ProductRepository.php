<?php 

require_once 'Config.php';
require_once 'Product.php';

class ProductRepository extends Config{
    // private $connection;
    

    // public function __construct($connection){
    //    $this->connection = $connection; 
    // }

    public function create(Product $product){
        $query = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $name = $product->getName();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stmt->bind_param("ssd", $name, $description, $price);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function getAllProducts(){
        $query = "SELECT * FROM products";
        $result = $this->connect()->query($query);
        $products = [];

        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $products[] = new Product($id, $name, $description, $price);
        }
        return $products;
    }

    public function read($id){
        $query = "SELECT * FROM products WHERE id = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            return new Product($id, $name, $description, $price);
        }
        return null;
    }

    public function update(Product $product){
        $query = "UPDATE products SET name = ?, description = ? , price = ?  WHERE id = ? ";
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $name = $product->getName();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $id = $product->getId();

        $stmt->bind_param("ssdi", $name, $description, $price, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
     
    }

    public function delete($id){
        $query = "DELETE FROM products WHERE id = ?";
        $conn =$this->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
        $stmt->close();
        $conn->close();
    }

}

?>