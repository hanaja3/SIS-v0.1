<?php

session_start();

require_once "../../config/db.php";


if(!isset($_GET['id'])){

    header("Location: users.php");
    exit();

}

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE user_id='$id'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if(!$user){

    echo "<script>
            alert('User not found.');
            window.location='users.php';
          </script>";
    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | Users Management</title>
    <link rel="stylesheet" href="../css/dashboard.css">

    <style>

.content{

    padding:30px;

}

.page-title{

    margin-bottom:25px;

}

.page-title h2{

    color:#17324d;

    font-size:30px;

}

.view-container{

    width:70%;

    margin:auto;

    background:#fff;

    padding:30px;

    border-radius:10px;

    box-shadow:0 3px 10px rgba(0,0,0,.15);

}

.photo-box{

    text-align:center;

    margin-bottom:30px;

}

.photo-box img{

    width:180px;

    height:180px;

    border-radius:50%;

    object-fit:cover;

    border:5px solid #17324d;

}

.info-group{

    margin-bottom:20px;

}

.info-group label{

    display:block;

    font-weight:bold;

    color:#17324d;

    margin-bottom:8px;

}

.info{

    background:#f4f4f4;

    padding:12px;

    border-radius:5px;

    border:1px solid #ddd;

}

.button-group{

    margin-top:30px;

    text-align:center;

}

.back-btn{

    background:#dc3545;

    color:white;

    padding:12px 25px;

    text-decoration:none;

    border-radius:5px;

}

.back-btn:hover{

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

            <li><a href="../auth-pages/logout.php">🚪 Logout</a></li>

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

        <h2>View User Details</h2>

    </div>

    <div class="view-container">

        <div class="photo-box">

            <img src="../../uploads/<?php echo $user['photo']; ?>">

        </div>

        <div class="info-group">

            <label>User ID</label>

            <div class="info">

                <?php echo $user['user_id']; ?>

            </div>

        </div>

        <div class="info-group">

            <label>Full Name</label>

            <div class="info">

                <?php echo $user['fullname']; ?>

            </div>

        </div>

        <div class="info-group">

            <label>Email Address</label>

            <div class="info">

                <?php echo $user['email']; ?>

            </div>

        </div>

        <div class="info-group">

            <label>Role</label>

            <div class="info">

                <?php echo $user['role']; ?>

            </div>

        </div>

        <div class="info-group">

            <label>Date Registered</label>

            <div class="info">

                <?php echo $user['created_at']; ?>

            </div>

        </div>

        <div class="button-group">

            <a href="users.php" class="back-btn">

                Back

            </a>

        </div>

    </div>

</div>

</body>
</html>