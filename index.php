<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login + Signup Form</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
  <?php
      require('Sdb.php');
      session_start();
     if (isset($_POST['Tname'])) {
        $username = stripslashes($_REQUEST['Tname']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `treg` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
          echo "<script>
          alert('Incorrect username or password');
          window.location.href='index.php';
          </script>"; 
        }
     }
  ?>

<?php 
    require('Sdb.php');
    
     if (isset($_POST['Sname'])) {
      $username = stripslashes($_REQUEST['Sname']);    // removes backslashes
      $username = mysqli_real_escape_string($con, $username);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($con, $password);
      // Check user is exist in the database
      $query    = "SELECT * FROM `student` WHERE username='$username'
                   AND password='" . md5($password) . "'";
      $result = mysqli_query($con, $query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      if ($rows == 1) {
          $_SESSION['username'] = $username;
          // Redirect to user dashboard page
          header("Location: Student/dashboard.php");
      } else {
        echo "<script>
        alert('Incorrect username or password');
        window.location.href='index.php';
        </script>";

          
      }
    }
   
?>


    <div class="main">
        <div class="card">
            <div class="card-title">
                <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>User <span id="action_title">Login</span></h2>
            </div>
            <div class="form">
                <div class="head" class="signup">
                    <div onclick="changeTab(this)" data-tab="login" class="login-tab">As Student</div>
                    <div onclick="changeTab(this)" data-tab="signup" class="signup-tab">As Teacher</div>
                </div>
                <div class="body" id="form-body">
                    <div class="login">
                        <div class="txt_field">
                            <input type="text" name="Sname" required>
                            <span></span>
                            <label>Username</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" name="password" required>
                            <span></span>
                            <label>Password</label>
                        </div>
                        <div class="pass">Forgot Password?</div>
                        <input type="submit" value="Login" name="Submit2">
                        <div class="signup_link">
                            Not a member?<a href="StudentReg.php">Signup</a>
                        </div>
                    </div>
                    <div class="signup">
                        <div class="txt_field">
                            <input type="text" name="Tname" required>
                            <span></span>
                            <label>Username</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" name="password" required>
                            <span></span>
                            <label>Password</label>
                        </div>
                        <div class="pass">Forgot Password?</div>
                        <input type="submit" value="Login" name="Submit1">
                        <div class="signup_link">
                            Not a member?<a href="TeacherReg.php">Signup</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="login.js"></script>
</body>

</html>