<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle image update
    $image = time() . '_' . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, 'assets/images/' . $image);

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<form action="edit.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <input type="text" name="name" value="<?php echo $product['name']; ?>">
    <textarea name="description"><?php echo $product['description']; ?></textarea>
    <input type="number" name="price" value="<?php echo $product['price']; ?>">
    <input type="file" name="image">
    <button type="submit">Update Product</button>
</form>
