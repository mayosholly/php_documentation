<?php 
// Includethe database connection
include('../database.php');




if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published = $_POST['published'];

    $sql = "INSERT INTO books (title, author, published) VALUES
            ('$title', '$author', '$published')";
    if($conn->query($sql) == TRUE ){
        echo  "Successfully Inputed";
    }else{
        echo "An Error occured". $conn->error;
    }
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
                    
    <form action="create.php"  method="POST">

    Title : <input class="form-control" type="text" name="title">
    <br>
    Author: <input type="text" class="form-control" name="author">
    <br>
    Published Year: <input type="text" class="form-control" name="published">
    <br>
    <input type="submit" class="btn btn-primary" value="Add Book">

                </div>
            </div>        
            </div>
        </div>

    </div>



    </form>
</body>
</html>