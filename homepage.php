<?php    //HOMEPAGE ADMIN
include('complaintsession.php');
if (!session_id()) {
    session_start();
}
include('dbconnect.php');
$fuser = $_SESSION['fuser'];
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
    <title>ESDM Project Front-End</title>
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
        text-align: right;
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

    .img-container {
        text-align: center;
      }
</style>

<body style="background-color:LightGoldenRodYellow;">
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
            <li><a class="active" href="homepage.php">Home</a></li>
            <li><a href="officerform.php">Register Officer</a></li>
            <li><a href="logout.php" >Logout</a></li>
        </ul>


        </ul>
        </div>
        <!-- Container wrapper -->
        </nav>

        <!--Main Navigation-->




    </header>
    <!--Main Navigation-->
    
    <!--Main layout-->
    <main style="margin-top: 58px;">
    <div class="img-container"> <img src="jkr_logo.png" alt="" width="150" height="150"> </div>
        <div class="container pt-4" style="padding: 3rem;">

            <div class="row">
                <div class="col-lg col-md">
                    <div class="card" style="min-height: 485px">
                        <?php if (isset($_GET['success'])) { ?> <br>
                            <div class="alert alert-info text-center" style="font-size: 15px;text-align: center;color: green;"><?php echo "Successful!"; ?></div> <?php } ?>

                        <?php if (isset($_GET['fail'])) { ?> <br>
                            <div class="alert alert-info text-center" style="font-size: 15px;text-align: center;color: red;"><?php echo "Failed!"; ?></div> <?php } ?>
                        <div class="card-header card-header-text">

                            <h4 class="card-title">Submitted Complaints (Admin Page)
                                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;

                                <?php
                                $sql9 = "SELECT * FROM user WHERE username='$fuser'";
                                $result9 = mysqli_query($conn, $sql9);
                                $row9 = mysqli_fetch_array($result9);
                                $usertype = $row9['role']; //role kepada current user

                                if ($usertype == 1) //admin
                                { ?>
                                    <a class="btn btn-outline-primary" href="officerform.php"><i class="fa-solid fa-square-plus me-2"></i>Register an officer </a>
                            </h4>
                        <?php
                                } elseif ($usertype == 2) //public
                                { ?>
                            <a class="btn btn-outline-primary" href="complaintform.php"><i class="fa-solid fa-square-plus me-2"></i>Make a complaint </a>
                        <?php } else //officer (usertype = 3 atau 4)
                                {
                                } ?>
      <!--ASSIGN OFFICERRRRRRRR
                    

                    $sqlpic = "SELECT * FROM user ORDER BY role_id  ASC";
                    $result = mysqli_query($conn, $sqlpic);
                    while($row = mysqli_fetch_array($result)) {
                        if ($row["role_id"] == "3"){
                            echo "<option value=\"{$row['role_id']}\" selected=\"selected\">{$row['role_name']}</option>";
                    }
                        else {
                            echo "<option value=\"{$row['role_id']}\">{$row['role_name']}</option>";
                        }       }
                    ?> -->             

                        </div>
                        <div class="card-content table-responsive p-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Complaint ID</th>
                                        <th scope="col">Name</th>
                                        <!-- <th scope="col"></th> submitted date - tambah dalam tb_complaint -->
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Date and Time</th>
                                        <th scope="col">Person In Charge</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $sql2 = "SELECT * FROM tb_complaint INNER JOIN user ON tb_complaint.comp_user = user.username ";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row2['comp_id']; ?></td>
                                            <td><?php echo $row2['name']; ?></td>
                                            <td><?php echo $row2['phone']; ?></td>
                                            <td><?php echo $row2['comp_desc']; ?></td>
                                            <td><?php
                                                $type = $row2['comp_type'];
                                                $sql3 = "SELECT * FROM tb_complaint INNER JOIN tb_comptype ON tb_complaint.comp_type = tb_comptype.type_id WHERE tb_complaint.comp_type='$type'";
                                                $result3 = mysqli_query($conn, $sql3);
                                                $row3 = mysqli_fetch_array($result3);
                                                echo $row3['type_desc']; ?></td>
                                            <td><?php
                                                if ($row2['comp_status'] == '1') {
                                                    echo "Pending";
                                                } else {
                                                    echo "Completed";
                                                } ?>
                                            </td>
                                            <td><?php echo $row2['comp_location'] ?? ""; ?></td>
                                            <td><?php echo $row2['comp_submitdate'] ?? ""; ?></td>
                                            <td>
                                     <?php
                                     $comp = $row2['comp_id'];
                                    $sqlpicx="SELECT * FROM tb_complaint JOIN tb_officer ON tb_complaint.comp_officer = tb_officer.officer_id JOIN user ON tb_officer.officer_username = user.username WHERE tb_complaint.comp_id = '$comp'" ;
                                    $resultpicx = mysqli_query($conn, $sqlpicx);
                                    $rowpicx = mysqli_fetch_array($resultpicx);


                                    $sqlpic3="SELECT * FROM user INNER JOIN tb_officer ON user.username = tb_officer.officer_username WHERE user.role = '3' AND tb_officer.officer_type = '1'" ;
                                    $resultpic3 = mysqli_query($conn, $sqlpic3); //JALANRAYA

                                    $sqlpic4="SELECT * FROM user INNER JOIN tb_officer ON user.username = tb_officer.officer_username WHERE user.role = '3' AND tb_officer.officer_type = '2'" ;
                                    $resultpic4 = mysqli_query($conn, $sqlpic4);

                                    $sqlpic5="SELECT * FROM user INNER JOIN tb_officer ON user.username = tb_officer.officer_username WHERE user.role = '3' AND tb_officer.officer_type = '3'" ;
                                    $resultpic5 = mysqli_query($conn, $sqlpic5);
                                    ?> 
                                    
                                    <form method="POST" action="assignofficer.php?id=<?php echo $row2['comp_id']; ?>" enctype="multipart/form-data">
                                        
                                        <select id="fofficer" class="form-select" name="fofficer" required="">
                                            <?php

                                    
                                    if($row2['comp_type']=='1') //mula jalanraya
                                    {
                                        if($rowpicx['comp_officer']==NULL)
                                        {
                                            echo "<option selected disabled>Not Assigned</option>";
                                            while ($rowpic3 = mysqli_fetch_array($resultpic3))
                                            {
                                            
                                                echo "<option value=\"{$rowpic3['officer_id']}\">{$rowpic3['name']}</option>";

                                            }

                                        }
                                        
                                        else
                                        {
                                            while ($rowpic3 = mysqli_fetch_array($resultpic3))
                                            {
                                            
                                                if($rowpic3['officer_id'] == $rowpicx['comp_officer'] )
                                                {
                                                    echo "<option selected disabled value=\"{$rowpic3['username']}\">{$rowpic3['name']}</option>";


                                                }
                                                else
                                                {
                                                    echo "<option value=\"{$rowpic3['officer_id']}\">{$rowpic3['name']}</option>";

                                                }
                                        
                                            }

                                        }
                                         
                                    } //HABIS Jalan raya
                                    
                                    
                                    elseif($row2['comp_type']=='2') //mula lampu isyarat
                                    {
                                        if($rowpicx['comp_officer']==NULL)
                                        {
                                            echo "<option selected disabled>Not Assigned</option>";
                                            while ($rowpic4 = mysqli_fetch_array($resultpic4))
                                            {
                                            
                                                echo "<option value=\"{$rowpic4['officer_id']}\">{$rowpic4['name']}</option>";

                                            }

                                        }
                                        
                                        else
                                        {
                                            while ($rowpic4 = mysqli_fetch_array($resultpic4))
                                            {
                                            
                                                if($rowpic4['officer_id'] == $rowpicx['comp_officer'] )
                                                {
                                                    echo "<option selected disabled value=\"{$rowpic4['username']}\">{$rowpic4['name']}</option>";


                                                }
                                                else
                                                {
                                                    echo "<option value=\"{$rowpic4['officer_id']}\">{$rowpic4['name']}</option>";

                                                }
                                        
                                            }

                                        }
                                         
                                    } //habis lampu isyarat
                                    
                                    else
                                    {
                                        if($rowpicx['comp_officer']==NULL)
                                        {
                                            echo "<option selected disabled>Not Assigned</option>";
                                            while ($rowpic5 = mysqli_fetch_array($resultpic5))
                                            {
                                            
                                                echo "<option value=\"{$rowpic5['officer_id']}\">{$rowpic5['name']}</option>";

                                            }

                                        }
                                        
                                        else
                                        {
                                            
                                            while ($rowpic5 = mysqli_fetch_array($resultpic5))
                                            {
                                            
                                                if($rowpic5['officer_id'] == $rowpicx['comp_officer'] )
                                                {
                                                    echo "<option selected disabled value=\"{$rowpic5['username']}\">{$rowpic5['name']}</option>";


                                                }
                                                else
                                                {
                                                    echo "<option value=\"{$rowpic5['officer_id']}\">{$rowpic5['name']}</option>";

                                                }
                                        
                                            }

                                        }
                                         
                                    } //habis lampu JALAN
                                    
                            
                                    //lampu jalan
                                   
                                    
                                   
                                        
                                 ?> </select>
                                </td> 
                                <td>
                                    <!-- <a class="btn btn-outline-danger" href="assignofficer.php?id=<?php echo $row2['comp_id']; ?>"><i class="fa fa-circle-xmark fa-lg"></i></a> -->
                                    <input type="submit" class="btn btn-outline-success" value="Assign"></input>
                            
                                </td></form>
                                </tr> <?php } ?>




                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        </div>
    </main>

    <!--Main layout-->
</body>

</html>