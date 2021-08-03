<?php
//include auth_session.php file on all user panel pages
include("Tauth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<?php include ('header.php'); ?>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now a teacher. Good Luck</p>
        <p><a href="Tlogout.php">Logout</a></p>
		
		<?php 
		$Ustu =  $_SESSION['username'];
		//echo $Ustu ;
		include("Sdb.php");
		$sql = "SELECT *  FROM  treg WHERE username='$Ustu'";
		$result = $con->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
		if($row = $result->fetch_assoc()) {?>


		<div class="col-md-3"> 
		<div class="single-tutor">

		
		 <?php $uemail= $row["email"] ?></p>

		 <?php $uloc= $row["Location"] ?></p>
		 <?php $usub= $row["Subject"] ?></p>
		 <?php $row["email"] ?></p>


		</div>
		</div>

		<?php 	}
					}

					echo $uloc;
									
						?>
						<a style="text-decoration:none" class=" text-light" href="update.php?location=<?php  echo $uloc ?>&email=<?php  echo $uemail ?>&subject=<?php  echo $usub ?>">
						<button class="btn btn-secondary mb-3">
		Update
		</button>
		</a>

		<a style="text-decoration:none" class="text-light" href="Slogout.php">			
		<button class="btn btn-success mb-3">
			Log Out
		</button>
		</a>
    </div>

	<?php 
			$stu =  $_SESSION['username'];
			//echo $stu ;
			include("Sdb.php");
			$sql = "SELECT *  FROM  teacher WHERE username='$stu'";
			$loc = $row["Location"];
			$result = $con->query($sql);
		
	?>

<!-- Getting students of Teachers Location -->
<h1  class="mx-4 mb-1">Students of <?php echo $loc; ?></h1>

<?php //echo $loc; 
										
	include("Sdb.php");
										
			$sql = "SELECT *  FROM  student WHERE Location LIKE '%$loc%' ";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				echo '<div class="row mb-3 p-3">';
				// output data of each row
			while($row = $result->fetch_assoc())  {?>


			<div class="col-md-3 p-3 mb-4 "> 
			<div class="card line">
			<div class="content py-3">
			<p><span>Teacher id: </span><?php echo $row["id"] ?></p>
			<p><span>Teacher name:</span> <?php echo $row["username"] ?></p>
			
			<p><span>Location:</span> <?php echo $row["Location"] ?></p>
			<p><span>Email:</span> <?php echo $row["email"] ?></p>
			

			</div>

</div>
</div>

<?php 	}echo '</div>';
			}
			
			?>

				
	<h1>All students</h1>

    <?php
    include("Sdb.php");
    $sql = "SELECT *  FROM  student";
	$result = $con->query($sql);
	 if ($result->num_rows > 0) {
		echo '<div class="row p-3 ">';
												// output data of each row
	while($row = $result->fetch_assoc()) {?>
	
	
		<div class="col-md-3 mb-4"> 
		<div class="single-tutor card line">
			<div class="content py-3 mx-4">
			<p><span>Student name:</span> <?php echo $row["username"] ?></p>
			<p><span>email:</span> <?php echo $row["email"] ?></p>
			<p><span>Location:</span> <?php echo $row["Location"] ?></p>
			</div>
		
			
			
			
		</div>
		</div>
		
		<?php 	}
										}
										echo "</div>"; ?>


</body>
</html>