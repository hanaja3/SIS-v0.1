<!DOCTYPE html>
<html>

<head>

    <title>Students Event Attendance Register</title>

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

        .login-box input,
        .login-box select{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
            font-size:16px;
        }

        .login-box input:focus,
        .login-box select:focus{
            border-color:#0d6efd;
            outline:none;
            box-shadow:0 0 5px rgba(13,110,253,.3);
        }

        .login-box input[type="file"]{
            padding:8px;
            cursor:pointer;
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

<h2>Create Account</h2>

<form action="register_process.php" method="POST" enctype="multipart/form-data">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="file" name="photo" accept="image/*" required>

<input type="email" name="email" placeholder="Email Address" required>

<input type="password" name="password" placeholder="Password" required>

<input type="text" name="contact_number" placeholder="Contact Number" required>

<input type="text" name="program" placeholder="Program" required>

<select name="year_level" required>
    <option value="">Select Year Level</option>
    <option value="1st Year">1st Year</option>
    <option value="2nd Year">2nd Year</option>
    <option value="3rd Year">3rd Year</option>
    <option value="4th Year">4th Year</option>
</select>

<button type="submit">
Register
</button>

</form>

<p>
Already have an account?
<a href="login.php">Login Here</a>
</p>

</div>

</body>
</html>