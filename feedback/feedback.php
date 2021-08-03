<!DOCTYPE html>
<html>
<head>
	<title>FeedBack Page</title>
	<link rel="stylesheet" type="text/css" href="feedback.css">
</head>
<body>

<?php
	require('Sdb.php');
	session_start();
	if (isset($_POST['feedback'])) {
		$feedback=$_POST['feedback'];
		$username = $_SESSION['username'];

		mysqli_query($con, "INSERT into `feedback` (username, feedback) 
			VALUES ('$username','$feedback')");

		echo "<script>
		alert('Feedback has been successfully added');
		</script>";  
	}
	else{
		echo "<script>
		alert('Error occured while sending feedback. TRY AGAIN!!');
		</script>";  
	}

?>
	<section class="contact">
		<div class="container">
			<div class="contactform">
				<form action="" method="post">
					<h2><b>Give your feedback.</b></h2>
					<?php echo $_SESSION['username'] ?>
					
					<div class="inputbox">
						<textarea required="required" name="feedback"></textarea>
						<span>write here.</span>
					</div>
					<div class="inputbox">
						<input type="submit" name="submit" value="submit">
					</div>
				</form>
			</div>
		</div>
	</section>
</body>
</html>