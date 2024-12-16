<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            padding: 50px;
        }
        a {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            width: 200px;
            text-align: center;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="sudent_login.php">Home</a>
        <a href="student_insertion.php">Add Student details</a>
        <a href="student_viewall.php">View All Students</a>
        <a href="student_search.php">Search a Student with a Student Id</a>
        <a href="student_delete.php">Delete a Student</a>
        <a href="student_update.php">Update Student details</a>
        <a href="student_logout.php">Logout</a>
    </div>
</body>
</html>
