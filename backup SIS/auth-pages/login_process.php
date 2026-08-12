<?php

session_start();

include "../config/db.php";


$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password'])){

        $_SESSION['user_id'] = $user['user_id'];

        $_SESSION['fullname'] = $user['fullname'];

        $_SESSION['photo'] = $user['photo'];

        $_SESSION['role'] = $user['role'];

        $_SESSION['contact_number'] = $user['contact_number'];

        $_SESSION['program'] = $user['program'];

        $_SESSION['year_level'] = $user['year_level'];


        if($user['role'] == "Admin"){

            header("Location: ../admin/dashboard.php");

        }

        else{

            header("Location: ../student/dashboard.php");

        }

        exit();

    }

    else{

        echo "<script> alert('Incorrect Password!');
        
        window.location='login.php';

        </script>";
    }

}

else{

    echo "<script>alert('Email not found!');

    window.location='login.php';

    </script>

    ";

}

?>