<?php
include 'connection.php'; 

$searchQuery = ""; 
$results = null;   

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
 
    $stmt = $conn->prepare("SELECT * FROM student_info WHERE Student_id LIKE ? OR Name LIKE ? OR Department LIKE ?");
    $likeQuery = "%" . $searchQuery . "%";
    $stmt->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
    $stmt->execute();
    $results = $stmt->get_result();
} 
else {
    $results = mysqli_query($conn, "SELECT * FROM student_info");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn back-btn">Back to Home</a>
        
        <h1>View Students</h1>

        <form method="GET" action="view_students.php" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Search by Student ID, Name, or Department" 
                   value="<?php echo htmlspecialchars($searchQuery); ?>" required>
            <button type="submit">Search</button>
            <a href="view_students.php" style="margin-left: 10px; text-decoration: none;">Clear</a>
        </form>

        <?php
        if ($results && mysqli_num_rows($results) > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>";

            while ($row = mysqli_fetch_array($results)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['Student_id']) . "</td>
                        <td>" . htmlspecialchars($row['Name']) . "</td>
                        <td>" . htmlspecialchars($row['Age']) . "</td>
                        <td>" . htmlspecialchars($row['gender']) . "</td>
                        <td>" . htmlspecialchars($row['Email']) . "</td>
                        <td>" . htmlspecialchars($row['Contact']) . "</td>
                        <td>" . htmlspecialchars($row['Department']) . "</td>
                        <td>
                            <a href='edit_student.php?Student_id=" . urlencode($row['Student_id']) . "'>
                                <i class='fas fa-edit'></i>
                            </a>
                            <a href='delete_confirmation.php?Student_id=" . urlencode($row['Student_id']) . "'>
                                <i class='fas fa-trash-alt'></i>
                            </a>
                        </td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No records found matching your query.</p>";
        }
        ?>
    </div>
</body>
</html>
