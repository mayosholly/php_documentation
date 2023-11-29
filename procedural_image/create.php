<?php 
include('db_config.php');

if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle image upload
    $image = time() . '_' . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, 'assets/images/' . $image );

    $sql =  "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
    if($conn->query($sql)){
        // header("Location: index.php");
        echo 'Successfull';
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?>


<form action="create.php" method="POST" enctype="multipart/form-data"  class="ajax-form">
    <input type="text" name="name" placeholder="Product Name"> <br>
    <textarea name="description" placeholder="Description"></textarea> <br>
    <input type="number" name="price" placeholder="Price"> <br>
    <input type="file" name="image"> <br>
    <button type="submit">Add Product</button>
</form>
<div class="message"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
    $(".ajax-form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var formData = new FormData(form[0]);
        var message = form.siblings(".message");

        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                message.html(response.message).addClass(response.status);
                if (response.status === "success") {
                    // Refresh the product list after successful action
                    loadProducts();
                }
            }
        });
    });

    // Function to refresh the product list
    function loadProducts() {
        $.ajax({
            type: "GET",
            url: "index.php",
            success: function(response) {
                $(".product-list").html(response);
            }
        });
    }

    // Initial load of the product list
    loadProducts();
});

</script>