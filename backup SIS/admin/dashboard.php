<?php

session_start();

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth-pages/login.php");
    exit();
}
?>
<!DOCTYPE html>

<html>

<head>

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>

<div class="container">

    <!-- Sidebar -->

    <div class="sidebar">

        <h2>SIS</h2>

        <ul>

            <li><a href="#">🏠 Dashboard</a></li>

            <li><a href="../admin/users/users.php">👤 Users</a></li>

            <li><a href="../admin/students/students.php">🎓 Students</a></li>

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

                <img src="../uploads/<?php echo $_SESSION['photo']; ?>">

                <span>

                    <?php echo $_SESSION['fullname']; ?>

                </span>

            </div>

        </div>

        <!-- Dashboard Cards -->

        <div class="cards">

            <div class="card">

                <h3>Total Users</h3>

                <h1>10</h1>

            </div>

            <div class="card">

                <h3>Total Students</h3>

                <h1>120</h1>

            </div>

            <div class="card">

                <h3>Total Courses</h3>

                <h1>5</h1>

            </div>

            <div class="card">

                <h3>Total Subjects</h3>

                <h1>35</h1>

            </div>

        </div>

        <!-- Recent Students -->

        <div class="table-container">

            <h2>Recent Registered Students</h2>

            <table>

                <tr>

                    <th>Photo</th>

                    <th>Student Number</th>

                    <th>Name</th>

                    <th>Course</th>

                    <th>Year</th>

                </tr>

                <tr>

                    <td><img src="../images/default.png"></td>

                    <td>2026-0001</td>

                    <td>Juan Dela Cruz</td>

                    <td>BSIT</td>

                    <td>1st Year</td>

                </tr>

                <tr>

                    <td><img src="../images/default.png"></td>

                    <td>2026-0002</td>

                    <td>Maria Santos</td>

                    <td>BSBA</td>

                    <td>2nd Year</td>

                </tr>

            </table>

        </div>

    </div>

</div>

</body>

</html>