<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database Management</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="view_students.php" class="nav-link">View Students</a>
        <a href="add_student.php" class="nav-link">Add Student</a>
    </div>

    <div class="container">
        <h1>Welcome to Student Database Management</h1>
        <p>Manage your student records easily with the following options:</p>

        
        <div class="action-buttons">
            <a href="view_students.php" class="btn primary-btn">
                <i class="fas fa-users"></i> View Students
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="add_student.php" class="btn secondary-btn">
                <i class="fas fa-user-plus"></i> Add Student
            </a>
        </div>

        <h2>Manage Students</h2>
        <p>Use the options above to manage student records. You can view all students, add new records, or edit existing ones.</p>
    </div>

</body>
</html>