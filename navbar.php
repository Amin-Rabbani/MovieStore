<?php 
    session_start(); 
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
    <div class="topnav">
        <?php if(isset($_SESSION['username'])) : ?>
        <a href="server.php?logout=true"> Log Out </a>
        <a href="profile.php"> Profile </a>
        <?php endif ?>
        <a href="index.php"> Main Page </a>
        <?php if($_SESSION['role'] == "publisher") : ?>
        <a href="addFilm.php"> Add Film </a>
        <?php endif ?>
    </div>
    <br><br>
</body>
</html>