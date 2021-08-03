
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"></head>
<body>
   <?php
    session_start();
    include('Sdb.php');
    include('header.php');
    
    $location = $_GET['location'];
    $email = $_GET['email'];
    $subject = $_GET['subject'];
  

?>


<?php 
    if(isset($_GET["submit"]))
    {
        $uemail = $_GET['updatedEmail'];
        $uloc = $_GET['updatedLocation'];
        $name = $_SESSION['username'];
        $subject = $_GET['updatedSubject'];
      
       $query = "UPDATE student SET email = '$uemail' , Location = '$uloc' , Subject = '$subject' WHERE username = '$name'  ";
       $data = mysqli_query($con,$query);
       if($data)
       {
  
        header('Location:dashboard.php');
       }


        
        
    
    }

?> 

<div class="d-flex justify-content-center UpdateForm">
<div>
<h1>Make your update</h1>
<form action="" method="get">
    <h5>Email:</h5><input type="text"  class="form-control bg-light mb-3" name="updatedEmail" value="<?php echo "$email" ?>" >
    <h5>Location:</h5><input type="text" class="form-control bg-light mb-3" name="updatedLocation" value="<?php echo "$location" ?>">
    <h5>Subject:</h5><input type="text" class="form-control bg-light mb-3" name="updatedSubject" value="<?php echo "$subject" ?>">
    <div class=" text-center">
    <button type="submit" id="submit" name="submit" class="btn btn-primary fs-5">Update</button>
    </div>
</form>
</div>
</div>

</body>
</html>


