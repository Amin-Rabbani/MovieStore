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
</head>
<body>
    <?php
        if($_SESSION['username'] == "") 
            header('Location: login.php');
        echo "You are a " . $_SESSION['role'] . " .<br><br><br><br><br>";
        $query = "SELECT * FROM Movies";
        $result = mysqli_query($db, $query);
    ?>
    <?php if(mysqli_num_rows($result)) : ?>
    <table name="Movies">
        <tr>
            <th> Name </th>
            <th> Director </th>
            <th> Price </th>
            <th> Buy </th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td> <?php echo $row['name']; ?> </td>
                <td> <?php echo $row['director']; ?> </td>
                <td> <?php echo $row['price']; ?> </td>
                <td> <?php echo "BUY"; ?> </td>
            </tr>
        <?php endwhile ?>
    </table>
    <?php endif ?>
</body>
</html>