<?php
    session_start();
    include('serever.php');
    include('navbar.php');
?>
<html>
<head>
    <title> Profile</title>
</head>
<body>
    <form method="POST" action="server.php">
        <p><b> Charge your profile :</b></p>
        <input type="number" name="credit" id="credit">
        <button type="submit" name="charge" id="charge"> Add </button>
        <br><br>
    </form>
</body>
</html>