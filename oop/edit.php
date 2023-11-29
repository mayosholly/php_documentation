<?php 

require_once 'ProductController.php';


if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])){
    $productId = $_GET["id"];
    $productController = new ProductController();
    $product = $productController->edit($productId);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        $productId = $_POST["id"];
        $productController = new ProductController();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
      
        $productController->update($productId, $name, $description, $price);
        header("Location: index.php");
    } catch (\Throwable $e) {
        echo $e->getMessage();
    }

}


?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
    <label>Name: <input type="text" name="name" value="<?php echo $product->getName(); ?>"></label><br>
    <label>Description: <textarea name="description"><?php echo $product->getDescription(); ?></textarea></label><br>
    <label>Price: <input type="text" name="price" value="<?php echo $product->getPrice(); ?>"></label><br>
    <button type="submit">Update</button>
</form>