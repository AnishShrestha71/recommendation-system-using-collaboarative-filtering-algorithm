<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<?php
	session_start();
     include ('header.php'); 
	include('Sdb.php');

	//echo $_SESSION['username']."</br>";

	//echo $_GET['id']."</br>";


 

	$stdname = $_SESSION['username'];
	$teaname = $_GET['id'];

	 $sql = mysqli_query($con, "SELECT `studentname` AND `teachername` FROM `teacherrating` WHERE studentname = '".$stdname."'AND teachername =  '".$teaname."'");

        if (mysqli_num_rows($sql)>0) 
        {   
            echo '<div class="mx-auto p-5">'; 
            echo "<div><h1>You have already rated this teacher <a href='dashboard.php'>Home page</a> !! </h1></div>";
            echo '</div>'; 
            die (); 
            
        } 
        else
        {
        	echo "";
        }

	

?>
<div class="">
<div class="ratingForm line">
<div class="p-4">
<p class="fs-2 mb-4">Hey, <?php echo $stdname; ?>!</p>
<p class="fs-3">Give rating to teacher <?php echo $teaname ?></p>


<form action="rating_stored.php?id=<?php  echo $_GET['id'] ?>" method="post"> 
	<div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
     </div>
	
	<span class='result'>0</span>

	<input type="hidden" name="rating"></br>
	<div class="text-center mt-3">
	<input type="submit" name="submit" class="btn btn-danger fs-5" value="Submit">
    </div>
</form>
</div>
</div>
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

	<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>

</body>
</html>
