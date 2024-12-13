delete.php
<?php
include 'conn.php';
if(isset($_POST['submit']))
{
	$id1=$_POST['id'];
	$sql = "DELETE FROM student WHERE studentid='$id1'";

if (mysqli_query($conn, $sql)) {
  header("Location: homepage.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}


	mysqli_close($conn);
}
else
{
?>
<html>
	<body>
	<center>
		<form action="" method="post">
		Student Id:
		<input type="textbox" name="id"><br>
		
		<input type="submit" name="submit" value="Submit"><br>
	</form>
	</center>
	</body>
</html>
<?php
}
?>
