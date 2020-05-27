<?php
    session_start();
    include('server.php');
    include('navbar.php');
?>
<html>
<head>
    <title> Profile</title>
    <link rel="stylesheet" type="text/css" href="pages.css">
    <link rel="stylesheet" type="text/css" href="moviesTable.css">
</head>
<body>
    <form method="POST" action="server.php">
        <p><b> Charge your profile :</b></p>
        <input type="number" name="credit" id="credit">
        <button type="submit" name="charge" id="charge"> Add </button>
    </form>
    <br><br>
    <p><b> Your Movies :</b></p>
    <?php 
        $user = $_SESSION['username'];
        $query = "SELECT * FROM Members WHERE username='$user'";
        $result = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($result);
        $movies = explode("/", $data['movies']);
        array_pop($movies);       
    ?>
    <table class="movies">
        <tr>
            <th> Name </th>
            <th> Director </th>
            <th> Genre </th>
        </tr>
        <?php foreach($movies as $movie) : ?>
        <?php
            $query = "SELECT * FROM Movies WHERE id='$movie'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_assoc($result);
        ?>
            <tr>
                <td> <?php echo $data['name']; ?></td>
                <td> <?php echo $data['director']; ?></td>
                <td> <?php echo $data['genre']; ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <?php if($_SESSION['role'] == "publisher") : ?>
        <p><b> Movies that you published :</b></p>
        <?php
            $query = "SELECT * FROM Movies WHERE publisher='$user'";
            $result = mysqli_query($db, $query);
        ?>
        <table class="movies">
            <tr>
                <th> Name </th>
                <th> Director </th>
                <th> Genre </th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td> <?php echo $row['name']; ?> </td>
                    <td> <?php echo $row['director']; ?> </td>
                    <td> <?php echo $row['genre']; ?> </td>
                </tr>
            <?php endwhile ?>
        </table>
    <?php endif ?>
</body>
</html>