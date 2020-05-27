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
    <link rel="stylesheet" type="text/css" href="pages.css">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body style="text-align: center">
    <div class="container">
    <form method="POST" action="server.php">
        <p><b> Add Film :</b></p>
        <hr>
        <label for="name"> Name :</label><br>
        <input type="text" name="name" id="name" required><br>
        <label for="director"> Director :</label><br>
        <input type="text" name="director" id="director" required><br>
        <i> Genre :</i><br>
        <select name="genre" id="genre">
            <option value="comedy"> Comedy </option>
            <option value="action"> Action </option>
            <option value="animation"> Animation </option>
        </select><br>
        <label for="price"> Price :</label><br>
        <input type="number" name="price" id="price" required><br>
        <label for="summary"> Summary :</label><br>
        <textarea name="summary" id="summary" cols="30" rows="10" required></textarea><br>
    </div>
        <button type="submit" name="addFilm" class="registerbtn"> Add </button><br><br>
    </form>
</body>
</html>