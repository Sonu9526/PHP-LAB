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
<html>
    <body>
        <center>
            <form action="" method="post">
                Student Name:
                <input type="text" name="name" required><br>
                Semester:
                <input type="text" name="semester" required><br>
                Course:
                <input type="text" name="course" required><br>
                Gender:
                <input type="radio" name="gender" value="female" required> Female
                <input type="radio" name="gender" value="male" required> Male<br>
                Hobbies:
                <input type="checkbox" name="hobbies[]" value="sports"> Sports
                <input type="checkbox" name="hobbies[]" value="reading"> Reading
                <input type="checkbox" name="hobbies[]" value="dance"> Dance
                <input type="checkbox" name="hobbies[]" value="music"> Music<br>
                <input type="submit" name="submit" value="Submit"><br>
            </form>
        </center>
    </body>
</html>
<?php
}
?>
