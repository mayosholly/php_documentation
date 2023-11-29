<?php 
session_start();

include('database.php');


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = "SELECT * FROM users WHERE email ='$email'";
    $r = mysqli_query($conn, $q);
    $user = mysqli_fetch_assoc($r);

    if($user && password_verify($password, $user["password"])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        header("Location: view.php");
    }else{
        echo "Invalid email or password";
    }
}


?>


<!-- login.php -->
<form method="post" action="login.php">
    <label>Email: <input type="email" name="email"></label><br>
    <label>Password: <input type="password" name="password"></label><br>
    <button type="submit">Login</button>
</form>
