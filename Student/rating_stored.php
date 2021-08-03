<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<?php

session_start();
include('Sdb.php');
include ('header.php'); 

$stdname = $_SESSION['username'];
$teaname = $_GET['id'];

if(isset($_POST['submit']))
{
	mysqli_query($con, "INSERT into `teacherrating` (studentname, teachername, rating) VALUES ('$stdname','$teaname',$_POST[rating])");
	echo '<div class="mx-auto p-5">'; 
	echo "<div><h1>Thank you for rating go back to home page <a href='dashboard.php'>Home page</a> !! </h1></div>";
	echo '</div>'; 
}
else
{
	echo "error occured";
}
?>
</body>
</html>

