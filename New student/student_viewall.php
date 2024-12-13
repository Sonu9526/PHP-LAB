<?php

include 'Conn.php';
$sql = "SELECT * FROM std_table";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<br> id:   " . $row["student_id"]. " <br>Name:  " . $row["Name"]. "<br>Semester:  " . $row["Semester"]."<br>Course: " . $row["Course"]."<br>Gender:  ".$row["Gender"] ."<br>Hobbies:  ".$row["Hobbies"] ."<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
<html>
 <body>
    <center>
	<a href="homepage.php">< Back</a>
    </center>
 </body>
</html>
