<?php
include('database.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if(empty($username) || empty($email) || empty($confirm_password)){
        echo "All Fields are required";
    }
    
    else if($password != $confirm_password){
        echo "Password Mismatch";
    }else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $q = "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        mysqli_query($conn, $q);
        echo "Registration Successfull";
    }

    
}


?>


<!-- register.php -->
<form action="register.php" method="post">
    <input type="text" name="username" placeholder="Username" >
    <input type="email" name="email" placeholder="Email" >
    <input type="password" name="password" placeholder="Password" >
    <input type="password" name="confirm_password" placeholder="Confirm Password" >
    <button type="submit">Register</button>
</form>
