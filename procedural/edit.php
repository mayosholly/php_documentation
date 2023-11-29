<?php 
// Includethe database connection
include('database.php');

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $id = $_GET['id'];
    $q = "SELECT * FROM books WHERE id=$id";
    $r = mysqli_query($conn, $q);
    $product = mysqli_fetch_assoc($r);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published = $_POST['published'];

    $q = "UPDATE books SET title='$title', author='$author', published='$published' WHERE id = $id";
    mysqli_query($conn, $q);
    header("Location: view.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">

                <h2>Add a New Book</h2>
            </div>
                <div class="card-body">
                    
    <form action="edit.php"  method="POST"> 
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>"><label>
    Title : <input value="<?php echo $product['title']; ?>" class="form-control" type="text" name="title">
    <br>
    Author: <input type="text" class="form-control" value="<?php echo $product['author']; ?>" name="author">
    <br>
    Published Year: <input type="text" class="form-control" value="<?php echo $product['published']; ?>"  name="published">
    <br>
    <input type="submit" class="btn btn-primary" value="Update Book">

                </div>
            </div>        
            </div>
        </div>

    </div>



    </form>
</body>
</html>