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

        /* Header */

        .page-title{

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:20px;

        }

        .page-title h2{

            color:#17324d;

        }

        /* Add Button */

        .add-btn{

            background:#0d6efd;
            color:white;
            text-decoration:none;
            padding:12px 20px;
            border-radius:5px;
            transition:.3s;

        }

        .add-btn:hover{

            background:#0b5ed7;

        }

        /* Table Container */

        .table-container{

            background:#fff;

            padding:20px;

            border-radius:10px;

            box-shadow:0 3px 10px rgba(0,0,0,.15);

        }

        /* Table */

        table{

            width:100%;

            border-collapse:collapse;

        }

        table th{

            background:#17324d;

            color:white;

            padding:15px;

            text-align:center;

        }

        table td{

            padding:15px;

            border-bottom:1px solid #ddd;

            text-align:center;

        }

        table tr:hover{

            background:#f5f5f5;

        }

        /* User Photo */

        .user-photo{

            width:55px;

            height:55px;

            border-radius:50%;

            object-fit:cover;

        }

        /* Action Buttons */

        .action-btn{

            text-decoration:none;

            padding:8px 10px;

            border-radius:5px;

            color:white;

            margin:0 2px;

            display:inline-block;

        }

        .view{

            background:#17a2b8;

        }

        .edit{

            background:#ffc107;

            color:black;

        }

        .delete{

            background:#dc3545;

        }

        .view:hover{

            background:#138496;

        }

        .edit:hover{

            background:#e0a800;

        }

        .delete:hover{

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

            <li><a href="../dashboard.php">🏠 Dashboard</a></li>

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

        <h2>User Management</h2>

        <a href="../users/add_user.php" class="add-btn">

            + Add New User

        </a>

    </div>

    <div class="table-container">

        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Photo</th>

                    <th>Full Name</th>

                    <th>Email</th>

                    <th>Role</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                <?php

                $sql = "SELECT * FROM users ORDER BY user_id DESC";

                $result = mysqli_query($conn,$sql);

                while($row = mysqli_fetch_assoc($result))
                {

                ?>

                <tr>

                    <td><?php echo $row['user_id']; ?></td>

                    <td>

                        <img src="../../uploads/<?php echo $row['photo']; ?>" class="user-photo">

                    </td>

                    <td>

                        <?php echo $row['fullname']; ?>

                    </td>

                    <td>

                        <?php echo $row['email']; ?>

                    </td>

                    <td>

                        <?php echo $row['role']; ?>

                    </td>

                    <td>

                        <a href="../users/view_user.php?id=<?php echo $row['user_id']; ?>" class="action-btn view">

                            👁

                        </a>

                        <a href="../users/edit_user.php?id=<?php echo $row['user_id']; ?>" class="action-btn edit">

                            ✏

                        </a>

                        <a href="../users/delete_user.php?id=<?php echo $row['user_id']; ?>" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this user?');">

                            🗑

                        </a>

                    </td>

                </tr>

                <?php

                }

                ?>

            </tbody>

        </table>

    </div>

</div>

</div>

</body>

</html>