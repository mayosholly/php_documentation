<?php
require_once 'ProductController.php';



$productController = new ProductController();
$products = $productController->index();


if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])){
    $productId = $_GET["id"];
    $productController->delete($productId);
    header('Location: index.php');
}

?>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product->getName(); ?></td>
                <td><?php echo $product->getDescription(); ?></td>
                <td><?php echo $product->getPrice(); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product->getId(); ?>">Edit</a>
                    <a onclick="return confirm('Are you sure? ')" href="index.php?id=<?php echo $product->getId(); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>