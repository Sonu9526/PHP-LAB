<?php
include 'Conn.php';
if(isset($_POST['submit']))
{
	$fname=$_POST['Name'];
	$sem=$_POST['Semester'];
	$crse=$_POST['Course'];
	$gender1=$_POST['Gender'];
	
	// Handle hobbies as an array and join them into a single string
   	 	if (isset($_POST['Hobbies']))
		 	{
       			 $hobbies1 = implode(", ", $_POST['Hobbies']); // Convert array to comma-separated string
    			} 
		else 
			{
        		$hobbies1 = ""; // If no hobbies are selected, set as empty
    			}
	$sql = "INSERT INTO std_table(Name,Semester,Course,Gender,Hobbies)VALUES ('$fname','$sem','$crse','$gender1','$hobbies1')";

	if (mysqli_query($conn, $sql)) {
  		header("Location: homepage.php");
		} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
	        Name:
		<input type="textbox" name="name"><br>
		Semester:
		<input type="textbox" name="semester"><br>
		Course:
		<input type="textbox" name="course"><br>
		Gender:
		<input type="radio" name="gender" value="female"> Female
		<input type="radio" name="gender" value="male">Male<br>
		Hobbies:
		<input type="checkbox" name="Hobbies[]" value="sports">Sports
		<input type="checkbox" name="Hobbies[]" value="reading">Reading
		<input type="checkbox" name="Hobbies[]" value="dance">Dance
		<input type="checkbox" name="Hobbies[]" value="music">Music<br>
		<input type="submit" name="submit" value="Submit"><br>
	</form>
	</center>
	</body>
</html>
<?php
}
?>
