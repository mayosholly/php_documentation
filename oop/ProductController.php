<?php
require_once 'Product.php';
require_once 'ProductRepository.php';

class ProductController {

    public function create($name, $description, $price){
        $product = new Product(null, $name, $description, $price);
        $response = new ProductRepository();
        $response->create($product);
    }

    public function index(){
        $products = new ProductRepository();
        return $products->getAllProducts();

    }

    public function edit($id){
        $products = new ProductRepository();
        return $products->read($id);

    }

    public function update($id, $name, $description, $price){
        $products = new ProductRepository();
        $prod =  $products->read($id);
        $prod->setName($name);
        $prod->setDescription($description);
        $prod->setPrice($price);

        $products->update($prod);

    }

    public function delete($id){
        $products = new ProductRepository();
        return $products->delete($id);

    }



}

?>