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

        header("Location: users.php");
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

.form-container{

    width:70%;
    margin:auto;
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.15);

}

.photo-preview{

    text-align:center;
    margin-bottom:25px;

}

.photo-preview img{

    width:180px;
    height:180px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #17324d;

}

.form-group{

    margin-bottom:20px;

}

.form-group label{

    display:block;
    margin-bottom:8px;
    font-weight:bold;
    color:#17324d;

}

.form-group input,
.form-group select{

    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:16px;

}

.button-group{

    margin-top:30px;

}

.update-btn{

    background:#198754;
    color:#fff;
    padding:12px 25px;
    border:none;
    border-radius:5px;
    cursor:pointer;

}

.update-btn:hover{

    background:#157347;

}

.cancel-btn{

    background:#dc3545;
    color:#fff;
    text-decoration:none;
    padding:12px 25px;
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

        <h2>Edit User</h2>

    </div>

    <div class="form-container">

        <form action="edit_user_process.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">

            <input type="hidden" name="old_photo" value="<?php echo $user['photo']; ?>">

            <div class="photo-preview">

                <img src="../../uploads/<?php echo $user['photo']; ?>">

            </div>

            <div class="form-group">

                <label>Upload New Photo</label>

                <input type="file" name="photo">

            </div>

            <div class="form-group">

                <label>Full Name</label>

                <input type="text"
                       name="fullname"
                       value="<?php echo $user['fullname']; ?>"
                       required>

            </div>

            <div class="form-group">

                <label>Email</label>

                <input type="email"
                       name="email"
                       value="<?php echo $user['email']; ?>"
                       required>

            </div>

            <div class="form-group">

                <label>New Password</label>

                <input type="password"
                       name="password"
                       placeholder="Leave blank to keep current password">

            </div>

            <div class="form-group">

                <label>Role</label>

                <select name="role">

                    <option value="Admin"
                    <?php if($user['role']=="Admin") echo "selected"; ?>>

                        Admin

                    </option>

                    <option value="Student"
                    <?php if($user['role']=="Student") echo "selected"; ?>>

                        Student

                    </option>

                </select>

            </div>

            <div class="button-group">

                <button type="submit" class="update-btn">

                    Update User

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