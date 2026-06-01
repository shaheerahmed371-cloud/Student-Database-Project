<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Add New Student</title>
</head>
<body>
    <div class="container">
        <h1>Add New Student</h1>
        <form action="" method="POST">
            <label>Student ID:</label>
            <input type="text" name="Student_id" placeholder="Enter Student ID" required>
            
            <label>Name:</label>
            <input type="text" name="Name" placeholder="Enter Name" required>
            
            <label>Age:</label>
            <input type="number" name="Age" placeholder="Enter Age" required>
            
            <label>Gender:</label>
            <select  name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            
            <label>Email:</label>
            <input type="email" name="Email" placeholder="Enter Email" required>
            
            <label>Contact:</label>
            <input type="text" name="Contact" placeholder="Enter Contact" required>
            
            <label>Department:</label>
            <input type="text" name="Department" placeholder="Enter Department" required>
            
            <div class="actions">
                <button type="submit" name="submit">Add Student</button>
                <a href="index.php" class="clear-btn">Cancel</a>
           </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $Student_id = $_POST['Student_id'];
            $Name = $_POST['Name'];
            $Age = $_POST['Age'];
            $gender = $_POST['gender'];
            $Email = $_POST['Email'];
            $Contact = $_POST['Contact'];
            $Department = $_POST['Department'];

            $stmt = $conn->prepare("INSERT INTO student_info (Student_id, Name, Age, gender, Email, Contact, Department) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssissss", $Student_id, $Name, $Age, $gender, $Email, $Contact, $Department);

            if ($stmt->execute()) {
                echo "<p style='color: green;'>New Student Record added successfully.</p>";
                header('Location: index.php');
            } else {
                echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
