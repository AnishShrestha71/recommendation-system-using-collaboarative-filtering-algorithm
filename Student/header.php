
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    </head>

    <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light p-3" style="background-color: gray;">
  <div class="container-fluid">
    <a class="navbar-brand " href="dashboard.php">HomeTution</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li>
          <form class="d-flex "  style="margin-left: 250px;" method="POST" action="search_result.php">
            <input type= "search" name="subject" id="subject"  class="form-control mx-2  searchbar" style="font-size: 13pt; height: 40px; width:280px; background-color: rgb(230, 217, 228); " placeholder="Enter the subject for your tutor">
		    	<button   class="btn btn-warning " ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
          </form>
        </li>
      </ul>
      <div class="d-flex">
        <div>
        <p class="text-white my-2">Hey, <?php echo $_SESSION['username']; ?>!</p>
        </div>
          
          <?php 
		        $Ustu =  $_SESSION['username'];
	          	//echo $Ustu ;
		        include("Sdb.php");
		        $sql = "SELECT *  FROM  student WHERE username='$Ustu'";
		        $result = $con->query($sql);
		        if ($result->num_rows > 0) {
		        	// output data of each row
		        if($row = $result->fetch_assoc()) {?>



		
		         <?php $uemail= $row["email"] ?></p>

		        <?php $uloc= $row["Location"] ?></p>
		         <?php $row["email"] ?></p>


		

	        	<?php 	}
				      	}

				      	//echo $uloc;
									
						?>
			
		
		
		<!-- <form method="POST" action="search_result.php" class="mb-3 ">
			<input type= "text" name="subject" id="subject" class="form-control mb-2" placeholder="Enter the subject for your tutor">
			<button   class="btn btn-warning">search</button>
		</form> -->
      <div class="mx-3">
      <a style="text-decoration:none" class=" text-light" href="update.php?location=<?php  echo $uloc ?>&email=<?php  echo $uemail ?>">
      <button class="btn btn-secondary mb-3" value="Update">
			   Update
		    </button>
        </a>
        
        <a style="text-decoration:none" class="text-light" href="Slogout.php">
		    <button class="btn btn-success mb-3">
			   Log Out
	    	</button>
        </a>
      </div>
		    

      </div>
     
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button> -->
      
    </div>
  </div>
</nav>
    </body>
</html>




