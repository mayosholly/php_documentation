<?php
// require_once 'Product.php';
// require_once 'ProductRepository.php';
require_once 'ProductController.php';


// $productRepository = new ProductRepository();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    try {
        $product = new ProductController();
        $product->create($name, $description, $price);
        echo "Successfull";

    } catch (\Throwable $e) {
        echo "Error". $e->getMessage();
    }
    

    // $newProduct = new Product(null, $name, $description, $price);
    // $productRepository->create($newProduct);
    // $newProduct->create();
    // header("Location: create.php");
}
?>

<form method="post">
    <label>Name: <input type="text" name="name"></label><br>
    <label>Description: <textarea name="description"></textarea></label><br>
    <label>Price: <input type="text" name="price"></label><br>
    <button type="submit">Create</button>
</form>
