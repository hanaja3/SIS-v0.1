<?php

session_start();

require_once "../../config/db.php";

if(!isset($_SESSION['user_id'])){

    header("Location: ../auth-pages/login.php");
    exit();

}

// Check if the ID exists

if(!isset($_GET['id'])){

    header("Location: users.php");
    exit();

}

$id = $_GET['id'];

// Retrieve the user first to get the photo filename

$sql = "SELECT * FROM users WHERE user_id='$id'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

// If the user does not exist

if(!$user){

    echo "<script>

            alert('User not found.');

            window.location='users.php';

          </script>";

    exit();

}

// Delete the photo if it exists

if(!empty($user['photo'])){

    $photo = "../../uploads/" . $user['photo'];

    if(file_exists($photo)){

        unlink($photo);

    }

}

// Delete the user record

$sql = "DELETE FROM users WHERE user_id='$id'";

if(mysqli_query($conn, $sql)){

    echo "<script>

            alert('User Deleted Successfully.');

            window.location='users.php';

          </script>";

}else{

    echo "<script>

            alert('Unable to Delete User.');

            window.location='users.php';

          </script>";

}

?>