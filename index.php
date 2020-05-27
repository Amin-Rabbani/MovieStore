<?php 
    session_start();
    include('server.php');
    include('navbar.php');
    if(isset($_SESSION['msg']))
        echo $_SESSION['msg'] . "<br>";
    unset($_SESSION['msg']);
?>
<html>
<head>
    <title> Main Page </title>
    <link rel="stylesheet" type="text/css" href="moviesTable.css">
    <link rel="stylesheet" type="text/css" href="pages.css">
</head>
<body>
    <?php
        if($_SESSION['username'] == "") 
            header('Location: login.php');
        echo "Welcome " . $_SESSION['username'] . " . <br><br><br> ";
        $query = "SELECT * FROM Movies";
        $result = mysqli_query($db, $query);
    ?>
    <?php if(mysqli_num_rows($result)) : ?>
    <table class="movies">
        <tr>
            <th> Name </th>
            <th> Director </th>
            <th> Price </th>
            <th> Buy </th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['director']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><a href="server.php?buyFilm=true&id=<?php echo $row['id'] ?>"> Buy </a></td>
            </tr>
        <?php endwhile ?>
    </table>
    <?php endif ?>
</body>
</html>