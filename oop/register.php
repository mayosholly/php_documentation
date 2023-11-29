

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
    <label>Username: <input type="text" name="username"></label><br>
        <label>Email: <input type="text" name="email"></label><br>
        <label>Password: <input type="password" name="password"></label><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>