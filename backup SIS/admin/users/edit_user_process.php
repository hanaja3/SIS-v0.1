<?php

require_once "../../config/db.php";

$id = $_POST['user_id'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$role = $_POST['role'];

$old_photo = $_POST['old_photo'];

/* Photo Upload */

if($_FILES['photo']['name'] != ""){

    $photo = $_FILES['photo']['name'];

    $temp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp,"../uploads/".$photo);

}else{

    $photo = $old_photo;

}

/* Password */

if(!empty($_POST['password'])){

    $password = md5($_POST['password']);

    $sql = "UPDATE users SET

            fullname='$fullname',

            photo='$photo',

            email='$email',

            password='$password',

            role='$role'

            WHERE user_id='$id'";

}else{

    $sql = "UPDATE users SET

            fullname='$fullname',

            photo='$photo',

            email='$email',

            role='$role'

            WHERE user_id='$id'";

}

if(mysqli_query($conn,$sql)){

    echo "<script>

            alert('User Updated Successfully.');

            window.location='users.php';

          </script>";

}else{

    echo "<script>

            alert('Failed to Update User.');

            window.history.back();

          </script>";

}

?>