<?php 
session_start();
include 'koneksi.php'; // Include your database connection

// Check if the user is logged in and is an admin
if (!isset($_SESSION['id_user']) || $_SESSION['level'] !== 'admin') {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Fetch all users from the tb_user table
$query = "SELECT * FROM tb_user";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin Dashboard</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_mobil.php">Tambah Mobil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
    <h4>Level: <?php echo htmlspecialchars($_SESSION['level']); ?></h4>

    <h2>User List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id_user']); ?></td>
                    <td><?php echo htmlspecialchars($user['user']); ?></td>
                    <td><?php echo htmlspecialchars($user['level']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

<?php
// Close the database connection
$koneksi->close();
?>
