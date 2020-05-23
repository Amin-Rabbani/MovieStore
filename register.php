<?php 
    require('server.php'); 
    include('navbar.php');
?>
<html>
<head>
    <title> register </title>
</head>
<body style="text-align: center;">
    <br><br><br><br><br><br>
    <form method="POST" action="register.php">
        <p><b>Register</b></p><br>
        <label for="username"> UserName :</label><br>
        <input type="text" name="username" id="username" required><br><br>
        <label for="email"> Email :</label><br>
        <input type="email" name="email" id="email" required><br><br>
        <label for="password"> Password :</label><br>
        <input type="password" name="password_1" id="password" required><br><br>
        <label for="password"> Repeat your Password :</label><br>
        <input type="password" name="password_2" id="password" required><br><br>
        <label for="customer"> Customer </label>
        <input type="radio" name="role" id="customer" value="customer" checked>
        <label for="publisher"> Publisher </label>
        <input type="radio" name="role" id="publisher" value="publisher">
        <br><br>
        <button type="submit" name="register_user" id="register"> Register </button>
    </form>
    <br><br>
    <a href="login.php"> Already Have an Account ?</a><br>
</body>
</html>