<?php
include 'Conn.php';

if(isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $sem = $_POST['semester'];
    $crse = $_POST['course'];
    $gender1 = $_POST['gender'];
    
    // Handle hobbies as an array and join them into a single string
    if (isset($_POST['hobbies'])) {
        $hobbies1 = implode(", ", $_POST['hobbies']); // Convert array to comma-separated string
    } else {
        $hobbies1 = ""; // If no hobbies are selected, set as empty
    }
    
    $sql = "INSERT INTO std_table (Name, Semester, Course, Gender, Hobbies) VALUES ('$fname', '$sem', '$crse', '$gender1', '$hobbies1')";

    if (mysqli_query($conn, $sql)) {
        header("Location: homepage.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .form-container input[type="text"],
        .form-container input[type="radio"],
        .form-container input[type="checkbox"],
        .form-container input[type="submit"] {
            margin: 10px 0;
        }
        .form-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <label for="name">Student Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="semester">Semester:</label><br>
            <input type="text" id="semester" name="semester" required><br>
            <label for="course">Course:</label><br>
            <input type="text" id="course" name="course" required><br>
            <label>Gender:</label><br>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label><br>
            <label>Hobbies:</label><br>
            <input type="checkbox" id="sports" name="hobbies[]" value="sports">
            <label for="sports">Sports</label>
            <input type="checkbox" id="reading" name="hobbies[]" value="reading">
            <label for="reading">Reading</label>
            <input type="checkbox" id="dance" name="hobbies[]" value="dance">
            <label for="dance">Dance</label>
            <input type="checkbox" id="music" name="hobbies[]" value="music">
            <label for="music">Music</label><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
<?php
}
?>
