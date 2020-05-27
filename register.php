<?php 
    require('server.php'); 
    include('navbar.php');
?>
<html>
<head>
    <title> register </title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body style="text-align: center;">
    <br><br>
    <form method="POST" action="register.php">
        <div class="container">
            <h1><b>Register</b></h1><br>
            <hr>
            <label for="username"> UserName :</label><br>
            <input type="text" name="username" id="username" required><br>
            <label for="email"> Email :</label><br>
            <input type="email" name="email" id="email" required><br>
            <label for="password"> Password :</label><br>
            <input type="password" name="password_1" id="password" required><br>
            <label for="password"> Repeat your Password :</label><br>
            <input type="password" name="password_2" id="password" required><br>
            <label for="customer"> Customer </label>
            <input type="radio" name="role" id="customer" value="customer" checked>
            <label for="publisher"> Publisher </label>
            <input type="radio" name="role" id="publisher" value="publisher">
            <br><br>
        </div>
        <button type="submit" name="register_user" class="registerbtn"> Register </button>
    </form>
    <br><br>
    <div class="container signin">
        <a href="login.php"> Already Have an Account ?</a><br>
    </div>
</body>
</html>