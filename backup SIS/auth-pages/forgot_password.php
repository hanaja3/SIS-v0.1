<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .login-box{
            width:400px;
            background:#fff;
            padding:35px;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
        }
        .login-box h2{
            text-align:center;
            color:#17324d;
            margin-bottom:25px;
            font-size:32px;
        }
        .login-box input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
            font-size:16px;
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
            margin-top:10px;
        }
        .login-box button:hover{
            background:#0d6efd;
        }
        .login-box p{
            text-align:center;
            margin-top:20px;
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
    <h2>Forgot Password</h2>
    <form action="login.php" method="GET">
        <input type="email" name="email" placeholder="Enter your email address" required>
        <button type="submit">Send Reset Link</button>
    </form>
    <p>
        <a href="login.php">Back to Login</a>
    </p>
</div>
</body>
</html>