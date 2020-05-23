<?php 
    session_start();  
?>

<html>
<body style="text-align: center">
    <?php if(isset($_SESSION['username'])) : ?>
    <button name="logout" id="logout"><a href="server.php?logout=true"> Log Out </a></button>
    <?php endif ?>
    <button name="mainPage" id="mainPage"><a href="index.php"> Main Page </a></button>
    <?php if($_SESSION['role'] == "publisher") : ?>
    <button name="addFilm" id="addFilm"><a href="addFilm.php"> Add Film </a></button>
    <?php endif ?>
    <br><br>
</body>
</html>