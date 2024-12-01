<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (full_name, grade, section, age) 
            VALUES ('$full_name', '$grade', '$section', $age)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

