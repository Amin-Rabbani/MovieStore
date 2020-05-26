<?php
    session_start();
    $username = "";
    $email = "";
    $role = "";

    $db = mysqli_connect("localhost", "phpmyadmin", "root", "MovieStore") or die("Could not connect to the DataBase !");

    $errors = array();
    
    $user = $_SESSION['username'];

    //Register User

    if(isset($_POST['register_user'])){
        //Register User
        
        $username = mysqli_real_escape_string($db, $_POST['username']);    
        $email = mysqli_real_escape_string($db, $_POST['email']);    
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);        
        $role = mysqli_real_escape_string($db, $_POST['role']);    

        //Validation

        if(empty($username)) array_push($errors, "UserName is Required");
        if(empty($email)) array_push($errors, "Email is Required");
        if(empty($password_1)) array_push($errors, "Password is Required");
        if($password_1 != $password_2) array_push($errors, "Passwords don't match");

        //Check if username already exist

        $user_check_query = "SELECT * FROM Members WHERE username='$username' OR email='$email'";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user){

            if($user['username'] == $username) array_push($errors, "UserName already exist");
            if($user['email'] == $email) array_push($errors, "Email already exist");
        }
        if(count($errors) == 0){

            $password = md5($password_1);
            $query = "INSERT INTO Members (username, email, password, role) VALUES 
                        ('$username', '$email', '$password', '$role')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['msg'] = "You registered Successfully !";
            header('Location: index.php');
        }
    }

    //Login User

    if(isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        if(empty($username)) array_push($errors, "UserName is Required");
        if(empty($password)) array_push($errors, "Password is Required");
        
        $password = md5($password);
        $query = "SELECT * FROM Members WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $data['role'];
            $_SESSION['msg'] = "You logged in Successfully !";
            header('Location: index.php');
        }else{
            array_push($errors, "Wrong UserName or Password!");
        }
    }
    
    //LogOut User

    if(isset($_GET['logout'])){
        session_destroy();
        header('Location: login.php');
    }

    //Add Film

    if(isset($_POST['addFilm'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $director = mysqli_real_escape_string($db, $_POST['director']);
        $genre = mysqli_real_escape_string($db, $_POST['genre']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $summary = mysqli_real_escape_string($db, $_POST['summary']);
        $publisher = $_SESSION['username'];

        $query = "INSERT INTO Movies (name, director, genre, publisher, price, summary) VALUES 
                    ('$name', '$director', '$genre', '$publisher', '$price', '$summary')";
        mysqli_query($db, $query);
        $_SESSION['msg'] = "Film added Successfully !";
        header('Location: index.php');
    }

    //Buy Film

    if(isset($_GET['buyFilm'])){
        $movieID = $_GET['id'];
        $query = "SELECT movies FROM Members WHERE username='$user'";
        $result = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($result);
        if(!movieAlreadyBought($data['movies'], $movieID)){
            $newMovie = "{$movieID}/";
            $newData = $data['movies'].$newMovie;
            $query = "UPDATE Members SET movies='$newData' WHERE username='$user'";
            mysqli_query($db, $query);
            header('Location: index.php');
            $_SESSION['msg'] = "You bought a Film Successfully !";
        }else{
            header('Location: index.php');
            $_SESSION['msg'] = "You already bought this movie !";
        }
    }

    //Charge profile

    if(isset($_POST['charge'])){
        $query = "SELECT credit FROM Members WHERE username='$user'";
        $result = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($result);
        $newCredit = $_POST['credit'] + $data['credit'];
        $query = "UPDATE Members SET credit='$newCredit' WHERE username='$user'";
        mysqli_query($db, $query);
        header('Location: index.php');
        $_SESSION['msg'] = "Your profile charged Successfully !";
    }

    function movieAlreadyBought($movies, $newMovie){
        $movies_arr = explode("/", $movies);
        foreach($movies_arr as $movieID){
            echo $movieID . "<br>";
            if($movieID == $newMovie)
                return true;
        }
        return false;
    }
?>