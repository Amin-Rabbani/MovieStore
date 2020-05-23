<?php 
    session_start();
    if($_SESSION['role'] == 'customer'){ 
        header('Location: index.php');
    }
    include('server.php');
    include('navbar.php');
?>
<html>
<head>
    <title> Add Film </title>
</head>
<body style="text-align: center">
    <form method="POST" action="server.php">
        <p><b> Add Film :</b></p>
        <label for="name"> Name :</label><br>
        <input type="text" name="name" id="name" required><br><br>
        <label for="director"> Director :</label><br>
        <input type="text" name="director" id="director" required><br><br>
        <i> Genre :</i>
        <select name="genre" id="genre">
            <option value="comedy"> Comedy </option>
            <option value="action"> Action </option>
            <option value="animation"> Animation </option>
        </select><br><br>
        <label for="price"> Price :</label><br>
        <input type="number" name="price" id="price" required><br><br>
        <label for="summary"> Summary :</label><br>
        <textarea name="summary" id="summary" cols="30" rows="10" required></textarea><br>
        <button type="submit" name="addFilm" id="addFilm"> Add </button><br><br>
    </form>
</body>
</html>