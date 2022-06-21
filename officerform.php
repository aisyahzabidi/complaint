<?php 

    include('complaintsession.php');
  if(!session_id())
  {
    session_start();
  }
include('dbconnect.php');
$fuser=$_SESSION['fuser'];

 
?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <title>CS443 Project</title>
</head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;  
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
.active {
  background-color: #757376;
}
</style>

<body>
<!--Main Navigation-->
<header>
        <!-- Navbar -->
        <!-- Navbar -->
     
    
            <!-- GAMBARRRR
            <li><a href="../student.php">
                <img src=""   />
            </a>      </li>    -->                                  
            <!-- Search form -->
            
    
            <!-- Right links -->
           
            <!-- Notification dropdown -->
                <!-- Avatar -->
                <ul>
  <li><a href="homepage.php">Home</a></li>
  <li><a class="active" href="officerform.php">Register Officer</a></li>
  <li><a href="complaintform.php">Complaint</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
                 
                 
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container pt-4" style="padding: 3rem;">

        <div class="row">
            <div class="col-lg col-md">
                
                <div class="card" style="min-height: 485px">
                    
                    <div class="card-header card-header-text">

                        <h3 class="card-title">Complaint Form</h3>

                    </div>   <!-- DEENAAAAAAA -->

                    <div class="card-content table-responsive p-2">
                        <form method="POST" action="officerprocess.php" enctype="multipart/form-data" class="row g-3">
                            <h5 class="form-label">Officer Details</h5>
                             
                             
                             
                            <div class="col-md-6">
                                <label for="fusername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="fusername" name="fusername" placeholder="Enter username" required="">
                            </div> 

                            <div class="col-md-6">
                                <label for="fpwd" class="form-label">Password</label>
                                <input type="password" class="form-control" id="fpwd" name="fpwd" placeholder="Enter complaint details" required="">
                            </div> 
                            <div class="col-md-6">
                                <label for="fname" class="form-label">Officer Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter full name" required="">
                            </div> 
                            <div class="col-md-6">
                                <label for="fphone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="fphone" name="fphone" placeholder="Enter phone number" required="">
                            </div> 
                            <div class="col-md-6">
                                <label for="femail" class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="femail" name="femail" placeholder="Enter email address" required="">
                            </div> 

                       
                            <div class="col-md-6">
                                <label for="ftype" class="form-label">Officer Type</label>
                                <select id="ftype" class="form-select" name="ftype" required="">
                                <option disabled selected>Choose officer type</option>
                                <option value="3">Officer Jalan Raya</option>
                                <option value="4">Officer Lampu Isyarat</option>
                                  <!---TAMBAH JENIS OFFICER----->
                            </div>
                               
                            </select><br><br><br>
</div>
<div style="text-align: center;">
                                <input type="submit" class="btn btn-primary" value="Register Officer"></input>
                                
                            </div> 
                        </form>
                    </div>
                
            <div class="col-md-6">
                                <a href="homepage.php" class="btn btn-secondary btn-sm" type="button">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    &nbsp;Back to main page
                </a></div>
            </div>
            
        </div>
    </div>
</main>
<!--Main layout-->
</body>

</html>
