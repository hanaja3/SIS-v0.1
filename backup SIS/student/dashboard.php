<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Student') {
    header('Location: ../auth-pages/login.php');
    exit;
}

include '../config/db.php';

$user_id = intval($_SESSION['user_id']);
$student_name = $_SESSION['fullname'] ?? 'Student';
$profile_photo = $_SESSION['photo'] ?? 'default.png';
$contact_number = $_SESSION['contact_number'] ?? 'Not available';
$program = $_SESSION['program'] ?? 'Not available';
$year_level = $_SESSION['year_level'] ?? 'Not available';
$age = 'Not available';

$query = "SELECT * FROM users WHERE user_id = $user_id LIMIT 1";
$result = mysqli_query($conn, $query);
if ($result && $user = mysqli_fetch_assoc($result)) {
    $student_name = $user['fullname'] ?: $student_name;
    $profile_photo = $user['photo'] ?: $profile_photo;
    $contact_number = $user['contact_number'] ?: $contact_number;
    $program = $user['program'] ?: $program;
    $year_level = $user['year_level'] ?: $year_level;
}

$orientations_present = 1;
$orientations_absent = 0;
$orientations_excuse = 1;
$departmental_present = 2;
$departmental_absent = 0;
$departmental_excuse = 1;
$general_present = 2;
$general_absent = 1;
$general_excuse = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../admin/css/dashboard.css">
    <style>
        .status-box {
            display:flex;
            justify-content:space-between;
            gap:10px;
            margin-top:15px;
        }
        .status-item {
            flex:1;
            padding:12px;
            border-radius:8px;
            color:white;
            text-align:center;
        }
        .status-item.present { background:#28a745; }
        .status-item.absent { background:#dc3545; }
        .status-item.excuse { background:#ffc107; color:#212529; }
        .events-section {
            margin:30px;
            padding:20px;
            background:white;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,.15);
        }
        .events-section h2 {
            margin-bottom:15px;
        }
        .events-list {
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:15px;
        }
        .event-card {
            background:#f8f9fa;
            padding:15px;
            border-radius:10px;
            border:1px solid #dee2e6;
        }
        .event-card h3 {
            margin-bottom:10px;
            color:#17324d;
        }
        .event-card p {
            margin-bottom:8px;
            color:#495057;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <h2>Event Attendance</h2>
        <ul>
            <li><a href="dashboard.php">Orientations</a></li>
            <li><a href="dashboard.php#departmental">Departmental Events</a></li>
            <li><a href="dashboard.php#general">General Events</a></li>
            <li><a href="dashboard.php#profile">Profile</a></li>
            <li><a href="../auth-pages/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="navbar">
            <h2>Student Event Dashboard</h2>
            <div class="profile">
                <img src="../uploads/<?php echo $profile_photo; ?>" alt="Profile photo">
                <span><?php echo $student_name; ?></span>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <h3>Orientations</h3>
                <h1><?php echo $orientations_present + $orientations_absent + $orientations_excuse; ?></h1>
            </div>
            <div class="card">
                <h3>Departmental Events</h3>
                <h1><?php echo $departmental_present + $departmental_absent + $departmental_excuse; ?></h1>
            </div>
            <div class="card">
                <h3>General Events</h3>
                <h1><?php echo $general_present + $general_absent + $general_excuse; ?></h1>
            </div>
            <div class="card">
                <h3>Profile</h3>
                <h1><?php echo $year_level; ?></h1>
            </div>
        </div>
        <div class="events-section">
            <h2>Orientation Attendance</h2>
            <div class="events-list">
                <div class="event-card">
                    <h3>Leadership Symposium</h3>
                    <p>Status: <span class="status-item present">Present</span></p>
                </div>
                <div class="event-card">
                    <h3>Drug Prevention Orientation</h3>
                    <p>Status: <span class="status-item absent">Absent</span></p>
                </div>
                <div class="event-card">
                    <h3>Earthquake Drills and Safety Protocols</h3>
                    <p>Status: <span class="status-item excuse">Excuse</span></p>
                </div>
                <div class="event-card">
                    <h3>Fire Prevention</h3>
                    <p>Status: <span class="status-item present">Present</span></p>
                </div>
            </div>
        </div>
        <div class="events-section" id="departmental">
            <h2>Departmental Event Attendance</h2>
            <div class="events-list">
                <div class="event-card">
                    <h3>IT Pro Week</h3>
                    <p>Status: <span class="status-item present">Present</span></p>
                </div>
                <div class="event-card">
                    <h3>Education Day</h3>
                    <p>Status: <span class="status-item excuse">Excuse</span></p>
                </div>
                <div class="event-card">
                    <h3>Entrepreneurship Day</h3>
                    <p>Status: <span class="status-item absent">Absent</span></p>
                </div>
            </div>
        </div>
        <div class="events-section" id="general">
            <h2>General Event Attendance</h2>
            <div class="events-list">
                <div class="event-card">
                    <h3>Acquaintance Party</h3>
                    <p>Status: <span class="status-item present">Present</span></p>
                </div>
                <div class="event-card">
                    <h3>Intramurals</h3>
                    <p>Status: <span class="status-item absent">Absent</span></p>
                </div>
                <div class="event-card">
                    <h3>Fiesta</h3>
                    <p>Status: <span class="status-item present">Present</span></p>
                </div>
                <div class="event-card">
                    <h3>College Day</h3>
                    <p>Status: <span class="status-item excuse">Excuse</span></p>
                </div>
            </div>
        </div>
        <div class="events-section" id="profile">
            <h2>Profile</h2>
            <div class="table-container">
                <table>
                    <tr>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Contact Number</th>
                    </tr>
                    <tr>
                        <td><img src="../uploads/<?php echo $profile_photo; ?>" style="width:60px;height:60px;border-radius:50%;object-fit:cover;"></td>
                        <td><?php echo $student_name; ?></td>
                        <td><?php echo $program; ?></td>
                        <td><?php echo $contact_number; ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?php echo $age; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
