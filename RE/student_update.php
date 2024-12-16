<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "student"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$std_id = $name = $semester = $course = $gender = $hobbies = "";
$error = "";

// INSERT Operation
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "";

    if (!empty($name) && !empty($semester) && !empty($course) && !empty($gender)) {
        $sql = "INSERT INTO std_table (Name, Semester, Course, Gender, Hobbies) 
                VALUES ('$name', '$semester', '$course', '$gender', '$hobbies')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success-msg'>Record added successfully!</p>";
        } else {
            echo "<p class='error-msg'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error-msg'>All fields except Hobbies are required!</p>";
    }
}

// UPDATE Operation
if (isset($_POST['update'])) {
    $std_id = $_POST['std_id'];
    $name = $_POST['name'];
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "";

    if (!empty($std_id)) {
        $sql = "UPDATE std_table SET Name='$name', Semester='$semester', Course='$course', 
                Gender='$gender', Hobbies='$hobbies' WHERE Std_id=$std_id";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success-msg'>Record updated successfully!</p>";
        } else {
            echo "<p class='error-msg'>Error updating record: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error-msg'>Std_id is required for updating records!</p>";
    }
}

// DELETE Operation
if (isset($_POST['delete'])) {
    $std_id = $_POST['std_id'];
    if (!empty($std_id)) {
        $sql = "DELETE FROM std_table WHERE Std_id=$std_id";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success-msg'>Record deleted successfully!</p>";
        } else {
            echo "<p class='error-msg'>Error deleting record: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error-msg'>Std_id is required for deleting records!</p>";
    }
}

// Display Records
$sql = "SELECT * FROM std_table";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
        h2, h3 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 100%;
            max-width: 500px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="radio"], input[type="checkbox"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success-msg {
            color: green;
        }
        .error-msg {
            color: red;
        }
        table {
            width: 100%;
            max-width: 700px;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Student Records</h2>
    <!-- Form for Insert/Update/Delete -->
    <form method="POST" action="">
        <label>Std_id (for Update/Delete):</label>
        <input type="number" name="std_id"><br>

        <label>Name:</label>
        <input type="text" name="name"><br>

        <label>Semester:</label>
        <input type="text" name="semester"><br>

        <label>Course:</label>
        <input type="text" name="course"><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female<br><br>

        <label>Hobbies:</label>
        <input type="checkbox" name="hobbies[]" value="sports"> Sports
        <input type="checkbox" name="hobbies[]" value="music"> Music
        <input type="checkbox" name="hobbies[]" value="dance"> Dance
        <input type="checkbox" name="hobbies[]" value="reading"> Reading<br><br>

        <button type="submit" name="insert">Add Record</button>
        <button type="submit" name="update">Update Record</button>
        <button type="submit" name="delete">Delete Record</button>
    </form>

    <h3>Student Table:</h3>
    <table>
        <tr>
            <th>Std_id</th>
            <th>Name</th>
            <th>Semester</th>
            <th>Course</th>
            <th>Gender</th>
            <th>Hobbies</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Std_id']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Semester']; ?></td>
                    <td><?php echo $row['Course']; ?></td>
                    <td><?php echo $row['Gender']; ?></td>
                    <td><?php echo $row['Hobbies']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No records found!</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
