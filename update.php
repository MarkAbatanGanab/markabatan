<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $age = $_POST['age'];

    $sql = "UPDATE students SET 
            full_name='$full_name', grade='$grade', 
            section='$section', age=$age WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
