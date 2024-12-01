<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management - Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-black-100">
<?php include 'navigation.php'; ?>
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl text-center font-bold mb-6">Student List</h2>
        <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5 inline-block">Add New Student</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="py-3 px-5 text-left">ID</th>
                        <th class="py-3 px-5 text-left">Full Name</th>
                        <th class="py-3 px-5 text-left">Grade</th>
                        <th class="py-3 px-5 text-left">Section</th>
                        <th class="py-3 px-5 text-left">Age</th>
                        <th class="py-3 px-5 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM students";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='border-b hover:bg-gray-100'>";
                            echo "<td class='py-2 px-5'>" . $row["id"] . "</td>";
                            echo "<td class='py-2 px-5'>" . $row["full_name"] . "</td>";
                            echo "<td class='py-2 px-5'>" . $row["grade"] . "</td>";
                            echo "<td class='py-2 px-5'>" . $row["section"] . "</td>";
                            echo "<td class='py-2 px-5'>" . $row["age"] . "</td>";
                            echo "<td class='py-2 px-5'>
                                    <a href='edit.php?id=" . $row["id"] . "' class='text-yellow-500 hover:text-yellow-600'>Edit</a> 
                                    | 
                                    <a href='delete.php?id=" . $row["id"] . "' class='text-red-500 hover:text-red-600'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center py-4'>No students found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
