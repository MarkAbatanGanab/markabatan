<?php
include 'db.php';

// Fetch counts
$totalStudents = $conn->query("SELECT COUNT(*) AS count FROM students")->fetch_assoc()['count'];
$totalSections = $conn->query("SELECT COUNT(DISTINCT section) AS count FROM students")->fetch_assoc()['count'];
?>
<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navigation.php'; ?>
<div class="container mx-auto mt-10">
    <h2 class="text-3xl text-center font-bold mb-6">Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="text-lg font-bold">Total Students</h3>
            <p class="text-2xl"><?php echo $totalStudents; ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="text-lg font-bold">Total Sections</h3>
            <p class="text-2xl"><?php echo $totalSections; ?></p>
        </div>
    </div>
</div>
</body>
</html>
