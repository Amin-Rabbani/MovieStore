<?php 
    require('server.php'); 
    include('navbar.php');
    if(isset($_SESSION['msg']))
        echo $_SESSION['msg'] . "<br>";
    unset($_SESSION['msg']);
?>
<html>
<head>
    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <br><br>
    <form method="POST" action="login.php">
        <div class="container">
            <h1><b>Login</b></h1><br>
            <hr>
            <label for="username"> UserName :</label><br>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password"> Password</label><br>
            <input type="password" name="password" id="password" required><br><br>
        </div>
            <button type="submit" name="login_user" class="registerbtn"> Login </button>
    </form>
    <br><br>
    <div class="container signin">
        <a href="register.php"> Don't Have an Account ?</a><br>
    </div>
</body>
</html>