<?php 
    require('server.php'); 
    include('navbar.php');
?>
<html>
<head>
    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <br><br><br><br><br><br>
    <form method="POST" action="login.php">
        <p><b>Login</b></p><br>
        <label for="username"> UserName :</label><br>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password"> Password</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit" name="login_user" id="login_user"> Login </button>
    </form>
    <br><br>
    <a href="register.php"> Don't Have an Account ?</a><br>
</body>
</html>