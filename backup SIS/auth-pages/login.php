<?php

session_start();

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "Admin"){
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../student/dashboard.php");
    }

    exit();
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>Students Event Attendance Login</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{

             background:#f4f6f9;

            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;

            height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

        }

        .login-box{

            width:400px;

            background:white;

            padding:40px;

            border-radius:10px;

            box-shadow:0px 10px 20px rgba(0,0,0,.3);

        }

        .login-box h2{

            text-align:center;

            margin-bottom:30px;

            color:#17324d;

            font-size:32px;

        }

        .login-box input{

            width:100%;

            padding:12px;

            margin-bottom:20px;

            border:1px solid #ccc;

            border-radius:5px;

            font-size:16px;

            outline:none;

        }

        .login-box input:focus{

            border:1px solid #0d6efd;

        }

        .login-box button{

            width:100%;

            padding:12px;

            background:#17324d;

            color:white;

            border:none;

            border-radius:5px;

            font-size:18px;

            cursor:pointer;

            transition:.3s;

        }

        .login-box button:hover{

            background:#0d6efd;

        }

        .login-box p{

            margin-top:20px;

            text-align:center;

            font-size:15px;

        }

        .login-box a{

            text-decoration:none;

            color:#0d6efd;

            font-weight:bold;

        }

        .login-box a:hover{

            text-decoration:underline;

        }

    </style>

</head>

<body>

<div class="login-box">

    <h2>Login</h2>

    <form action="login_process.php" method="POST">

        <input type="email" name="email" placeholder="Email Address" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

    </form>

    <p>
        <a href="forgot_password.php">Forgot Password?</a>
    </p>

    <p>
        Don't have an account?
        <a href="register.php">Register Here</a>
    </p>

</div>

</body>
</html>