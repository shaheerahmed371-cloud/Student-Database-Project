<?php
include 'connection.php'; 

if (isset($_GET['Student_id'])) {
    $Student_id = $_GET['Student_id'];

    // Fetch existing student details
    $stmt = $conn->prepare("SELECT * FROM student_info WHERE Student_id = ?");
    $stmt->bind_param("s", $Student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "Student not found.";
        exit;
    }

    $stmt->close();
}

if (isset($_POST['update'])) {
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $gender = $_POST['gender'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];
    $Department = $_POST['Department'];

    $updateStmt = $conn->prepare(
        "UPDATE student_info 
         SET Name = ?, Age = ?, gender = ?, Email = ?, Contact = ?, Department = ? 
         WHERE Student_id = ?"
    );
    $updateStmt->bind_param("sisssss", $Name, $Age, $gender, $Email, $Contact, $Department, $Student_id);

    if ($updateStmt->execute()) {
        echo "<p>Student record updated successfully!</p>";
        header("Location: view_students.php");
        exit();
    } else {
        echo "<p>Error updating record: " . $updateStmt->error . "</p>";
    }

    $updateStmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Record</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student Record</h1>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="Name" value="<?php echo htmlspecialchars($student['Name']); ?>" required>

            <label>Age:</label>
            <input type="number" name="Age" value="<?php echo htmlspecialchars($student['Age']); ?>" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="Male" <?php echo ($student['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($student['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo ($student['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label>Email:</label>
            <input type="email" name="Email" value="<?php echo htmlspecialchars($student['Email']); ?>" required>

            <label>Contact:</label>
            <input type="text" name="Contact" value="<?php echo htmlspecialchars($student['Contact']); ?>" required>

            <label>Department:</label>
            <input type="text" name="Department" value="<?php echo htmlspecialchars($student['Department']); ?>" required>

            <div class="actions">
                <button type="submit" name="update">Update</button>
                <a href="view_students.php" class="clear-btn">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
