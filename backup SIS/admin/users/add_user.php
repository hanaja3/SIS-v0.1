<?php

session_start();

require_once "../../config/db.php";

if(!isset($_SESSION['user_id'])){

    header("Location: ../auth-pages/login.php");

    exit();

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Admin Dashboard | Users Management</title>

    <link rel="stylesheet" href="../css/dashboard.css">

    <style>

        /* Content */
.content{
    padding:30px;
}

/* Page Title */
.page-title{
    margin-bottom:25px;
}

.page-title h2{
    color:#17324d;
    font-size:30px;
}

/* Form Container */
.form-container{
    width:70%;
    background:#fff;
    margin:auto;
    padding:30px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.15);
}

/* Form Group */
.form-group{
    margin-bottom:20px;
}

/* Label */
.form-group label{
    display:block;
    font-weight:bold;
    margin-bottom:8px;
    color:#17324d;
}

/* Input Fields */
.form-group input,
.form-group select{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:16px;
}

.form-group input:focus,
.form-group select:focus{
    border:1px solid #0d6efd;
    outline:none;
}

/* Buttons */
.button-group{
    margin-top:30px;
}

.save-btn{
    background:#198754;
    color:#fff;
    padding:12px 25px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

.save-btn:hover{
    background:#157347;
}

.cancel-btn{
    background:#dc3545;
    color:#fff;
    padding:12px 25px;
    text-decoration:none;
    border-radius:5px;
    margin-left:10px;
}

.cancel-btn:hover{
    background:#bb2d3b;
}

    </style>

</head>

<body>

<div class="container">

    <!-- Sidebar -->

    <div class="sidebar">

        <h2>SIS</h2>

        <ul>

            <li><a href="../admin/dashboard.php">🏠 Dashboard</a></li>

            <li><a href="../users/users.php">👤 Users</a></li>

            <li><a href="../students/students.php">🎓 Students</a></li>

            <li><a href="#">📚 Courses</a></li>

            <li><a href="#">📖 Subjects</a></li>

            <li><a href="#">📝 Enrollments</a></li>

            <li><a href="#">⚙ Profile</a></li>

            <li><a href="../../auth-pages/logout.php">🚪 Logout</a></li>

        </ul>

    </div>

    <!-- Main Content -->

    <div class="main">

        <!-- Navbar -->

        <div class="navbar">

            <h2>Administrator Dashboard</h2>

            <div class="profile">

                <img src="../../uploads/<?php echo $_SESSION['photo']; ?>">

                <span>

                    <?php echo $_SESSION['fullname']; ?>

                </span>

            </div>

        </div>
    
        <div class="content">

    <div class="page-title">

        <h2>Add New User</h2>

    </div>

    <div class="form-container">

        <form action="add_user_process.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">

                <label>Full Name</label>

                <input type="text" name="fullname" placeholder="Enter Full Name" required>

            </div>

            <div class="form-group">

                <label>Upload Photo</label>

                <input type="file" name="photo" accept="image/*" required>

            </div>

            <div class="form-group">

                <label>Email Address</label>

                <input type="email" name="email" placeholder="Enter Email Address" required>

            </div>

            <div class="form-group">

                <label>Password</label>

                <input type="password" name="password" placeholder="Enter Password" required>

            </div>

            <div class="form-group">

            <label>Role</label>

            <select name="role" required>

                <option value="">Select Role</option>

                <option value="Admin">Admin</option>

                <option value="Student">Student</option>

            </select>

        </div>

            <div class="button-group">

                <button type="submit" class="save-btn">

                    Save User

                </button>

                <a href="users.php" class="cancel-btn">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>