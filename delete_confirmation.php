<?php
include 'connection.php';

if(isset($_GET['Student_id']))
{
    $Student_id=$_GET['Student_id'];

    $stmt=$conn->prepare("SELECT * FROM student_info WHERE Student_id= ?");
    $stmt->bind_param("s",$Student_id);
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows==1)
    {
        $n=$result->fetch_assoc();
        $Name=$n['Name'];
    }
    else
    {
        echo "No student found with the given Student ID.";
        exit;
    }
    $stmt->close();
}
else{
    echo "Student ID not provided.";
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['confirm']))
    {
        $stmt=$conn->prepare("DELETE FROM student_info WHERE Student_id=?");
        $stmt->bind_param("s",$Student_id);

        if($stmt->execute())
        {
            echo "Student Record deleted Successfully.";
            header("location: view_students.php");
            exit;
        }
        else
        {
            echo "Error deleting record: ". $stmt->error;
        }
        $stmt->close();
    }
    else
    {
        header("location: view_students.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Delete Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Delete Confirmation</h1>
    <p>Are you Sure you want to Delete the record of <strong><?php echo htmlspecialchars($Name); ?></strong></p>
    <div class="confirmation-box">
    <form method="POST" action="">
        <button type="submit" class="confirm" name="confirm">Confirm</button>
        <button type="submit" class="cancel" name="cancel">Cancel</button>
   </form>
   </div>
</body>
</html>