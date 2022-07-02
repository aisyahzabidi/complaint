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
  <li><a   href="homepage.php">Home</a></li>
  <li><a  href="officerform.php">Register Officer</a></li>
  <li><a class="active" href="complaintform.php">Complaint</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
                 
                 
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
</header>
<!--Main Navigation-->
<!--Main Navigation-->
 
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container pt-4" style="padding: 3rem;">

        <div class="row">
            <div class="col-lg col-md">
                
                <div class="card" style="min-height: 400px">
                    
                    <div class="card-header card-header-text">

                        <h3 class="card-title">Complaint Form (No login required)</h3>

                    </div>   <!-- DEENAAAAAAA -->

                    <div class="card-content table-responsive p-2">
                        <form method="POST" action="unregcomplaintprocess.php" enctype="multipart/form-data" class="row g-3">
                            <h5 class="form-label">User Details</h5>
                            <div class="col-md-6">
                                <b><label for="fname" class="form-label">Name</label></b><br>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter full name" required=""> 
                                
                            </div>
                            <div class="col-md-6"> <!-- Stated kat form-->
                                <b><label for="faddress" class="form-label">Address</label></b><br>
                                 <input type="text" class="form-control" id="faddress" name="faddress" placeholder="Enter address" required="">
                            </div>
                            <div class="col-md-4"> <!-- Stated kat form-->
                                <b><label for="fphone" class="form-label">Age</label></b><br>
                                 <input type="number" class="form-control" id="fage" name="fage" placeholder="Select age" required="">
                            </div>
                           
                       
                            <div class="col-md-4">
                                <label for="ftype" class="form-label">State</label>
                                <select id="fstate" class="form-select" name="fstate" >
                                <option disabled selected>Choose state</option>
                                <option value="Selangor">Selangor </option>
                                <option value="Kedah">Kedah </option>
                                <option value="Negeri Sembilan">Negeri Sembilan </option>
                                <option value="Perak">Perak </option>
                                <option value="Pahang">Pahang </option>
                                <option value="Perlis">Perlis </option>
                                <option value="Johor">Johor </option>
                                <option value="Melaka">Malacca </option>
                                <option value="Terengganu">Terengganu </option>
                                <option value="Kelantan">Kelantan </option>
                                <option value="Penang">Penang </option></select> 
                                 
                            </div>
                               
                            

                            <div class="col-md-4">
                                <label for="fgender" class="form-label">Gender</label>
                                <select id="fgender" class="form-select" name="fgender" required="">
                                <option disabled selected>Choose gender</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option></select> 
                    
                            </div>

                            <hr/>
                            <h5 class="form-label">Complaint Details</h5>
                            <div class="col-md-6">
                                <label for="fdesc" class="form-label">Complaint Description</label>
                                <input type="text" class="form-control" id="fdesc" name="fdesc" placeholder="Enter complaint details" required="">
                            </div> 

                       
                            <div class="col-md-6">
                                <label for="ftype" class="form-label">Complaint Type</label>
                                <select id="ftype" class="form-select" name="ftype" required="">
                                <option disabled selected>Choose complaint type</option>
                                <option value="1">Jalan Raya</option>
                                <option value="2">Lampu Isyarat</option>
                                <option value="3">Lampu Jalan</option>  <!---Already added-----></select>
                            </div>
                               
                            
                               
                            
</div><br><br> 
<div style="text-align: center;">
                                <input type="submit" class="btn btn-primary" value="Submit complaint"></input>
                                
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
