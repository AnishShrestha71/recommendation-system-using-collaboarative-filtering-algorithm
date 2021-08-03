

<?php
    session_start();
    include('Sdb.php');
    include('header.php');
    
    $location = $_GET['location'];
    $email = $_GET['email'];
    $subject = $_GET['subject'];
    $exp = $_GET['exp']
  
?>
<?php 
    if(isset($_GET["submit"]))
    {
        $uemail = $_GET['updatedEmail'];
        $uloc = $_GET['updatedLocation'];
        $name = $_SESSION['username'];
        $usub = $_GET['updatedSubject'];
        $uexp = $_GET['updatedExperience'];

       $query = "UPDATE treg SET email = '$uemail' , Location = '$uloc' , Subject = '$usub', Experience = '$uexp' WHERE username = '$name'  ";
       $data = mysqli_query($con,$query);
       if($data)
       {
        
        

        header('Location:dashboard.php');
       }


        
        
    
    }

?>
<div class="d-flex justify-content-center">
<div>
<h1>make your update</h1>
<form action="" method="get">
    Email:<input type="text" name="updatedEmail" value="<?php echo "$email" ?>"><br><br>
    Location:<input type="text" name="updatedLocation" value="<?php echo "$location" ?>"><br><br>
    Subject:<input type="text" name="updatedSubject" value="<?php echo "$subject" ?>"><br><br>
    Subject:<input type="text" name="updatedExperience" value="<?php echo "$exp" ?>"><br><br>
    <button type="submit" id="submit" name="submit">Update</button>
</form>
</div>
</div>

