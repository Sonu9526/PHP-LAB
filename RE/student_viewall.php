<?php

include 'Conn.php';
$sql = "SELECT * FROM std_table";
$result = mysqli_query($conn, $sql);

echo '<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>';

if (mysqli_num_rows($result) > 0) {
    echo '<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Gender</th>
                <th>Hobbies</th>
            </tr>';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row["Std_id"] . '</td>
                <td>' . $row["Name"] . '</td>
                <td>' . $row["Semester"] . '</td>
                <td>' . $row["Course"] . '</td>
                <td>' . $row["Gender"] . '</td>
                <td>' . $row["Hobbies"] . '</td>
              </tr>';
    }
    echo '</table>';
} else {
    echo '<p style="text-align: center;">0 results</p>';
}

mysqli_close($conn);

echo '<center><a href="homepage.php">< Back</a></center>';
echo '</body></html>';
?>
