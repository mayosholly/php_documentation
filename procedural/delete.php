<?php  
include('database.php');

if($_SERVER['REQUEST_METHOD'] == "GET"){
   
    $id = $_GET['id'];
    $q = "DELETE FROM books WHERE id=$id";
    $r = mysqli_query($conn, $q);
    header("Location: view.php");


}

?>