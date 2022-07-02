<?php
include('complaintsession.php');
if (!session_id()) {
    session_start();
}
include('dbconnect.php');
$fuser = $_SESSION['fuser'];

$sql9 = "SELECT * FROM user WHERE username='$fuser'";
$result9 = mysqli_query($conn, $sql9);
$row9 = mysqli_fetch_array($result9);
$usertype = $row9['role']; //role kepada current user
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
            <li><a class="active" href="homepage.php">Home</a></li>


            <li><a href="logout.php">Logout</a></li>
        </ul>


        </ul>
        </div>
        <!-- Container wrapper -->
        </nav>

        <!--Main Navigation-->




    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 10px; background-color:LightGoldenRodYellow;">
        <div style="text-align:center; font: 14px sans-serif;">Jabatan Kerja Raya</div>
        <div class="container pt-4" style="padding: 3rem;">

            <div class="row">
                <div class="col-lg col-md">
                    <div class="card" style="min-height: 485px">
                        <?php if (isset($_GET['success'])) { ?> <br>
                            <div class="alert alert-info text-center" style="font-size: 15px;text-align: center;color: green;"><?php echo "Successful!"; ?></div> <?php } ?>

                        <?php if (isset($_GET['fail'])) { ?> <br>
                            <div class="alert alert-info text-center" style="font-size: 15px;text-align: center;color: red;"><?php echo "Failed!"; ?></div> <?php } ?>
                        <div class="card-header card-header-text">

                            <h4 class="card-title">Submitted Complaints
                                <?php
                                if ($usertype == '3') {
                                    echo " (Jalan Raya)";
                                } else {
                                    echo " (Lampu Isyarat)";   //LABEL
                                } ?>
                                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;




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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($usertype == 3)  //officer jalan raya
                                    {
                                        $sqli = "SELECT * FROM tb_complaint INNER JOIN user ON tb_complaint.comp_user = user.username WHERE comp_type = '1' ";  //complaint pasal jalan
                                        $resulti = mysqli_query($conn, $sqli);
                                        while ($rowi = mysqli_fetch_array($resulti)) { ?>
                                            <tr>
                                                <td><?php echo $rowi['comp_id']; ?></td>
                                                <td><?php echo $rowi['name']; ?></td>
                                                <td><?php echo $rowi['phone']; ?></td>
                                                <td><?php echo $rowi['comp_desc']; ?></td>
                                                <td><?php
                                                    $type = $rowi['comp_type'];
                                                    $idcompl = $rowi['comp_id'];
                                                    $sqld = "SELECT * FROM tb_complaint RIGHT JOIN tb_comptype ON tb_complaint.comp_type = tb_comptype.type_id LEFT JOIN tb_status ON tb_complaint.comp_status = tb_status.status_id WHERE tb_complaint.comp_type='$type' AND tb_complaint.comp_id='$idcompl'";
                                                    $resultd = mysqli_query($conn, $sqld);
                                                    $rowd = mysqli_fetch_array($resultd);
                                                    echo $rowd['type_desc']; ?></td>
                                                <td>
                                                    <?php echo $rowd['status_name'] ?>
                                                    <?php
                                                    if ($rowi['comp_status'] == '1') //pending
                                                    { ?>
                                                        &nbsp;<a class="btn btn-outline-success" href="completestatus.php?id=<?php echo $rowi['comp_id']; ?>"><i class="fa fa-circle-check fa-lg"></i></a> <?php
                                                                                                                                                                                                        } else if ($rowi['comp_status'] == '3') //inprogress
                                                                                                                                                                                                        { ?>
                                                        &nbsp;<a class="btn btn-outline-warning" href="inprogressstatus.php?id=<?php echo $rowi['comp_id']; ?>"><i class="fa fa-spinner fa-spin fa-lg"></i></a> <?php


                                                                                                                                                                                                            } else { //completed 
                                                                                                                                                                                                                ?>
                                                        &nbsp;<a class="btn btn-outline-danger" href="pendingstatus.php?id=<?php echo $rowi['comp_id']; ?>"><i class="fa fa-circle-xmark fa-lg"></i></a> <?php
                                                                                                                                                                                                            } //end else status 
                                                                                                                                                                                                        } //end while
                                                                                                                                                                                                            ?> </td>
                                            </tr> <?php
                                                } //end if (usertype)

                                                else  //officer lampu isyarat
                                                {
                                                    $sqli = "SELECT * FROM tb_complaint INNER JOIN user ON tb_complaint.comp_user = user.username WHERE comp_type = '2' ";  //complaint pasal lampu
                                                    $resulti = mysqli_query($conn, $sqli);
                                                    while ($rowi = mysqli_fetch_array($resulti)) { ?>
                                                <tr>
                                                    <td><?php echo $rowi['comp_id']; ?></td>
                                                    <td><?php echo $rowi['name']; ?></td>
                                                    <td><?php echo $rowi['phone']; ?></td>
                                                    <td><?php echo $rowi['comp_desc']; ?></td>
                                                    <td><?php
                                                        $type = $rowi['comp_type'];
                                                        $idcompl = $rowi['comp_id'];
                                                        $sqld = "SELECT * FROM tb_complaint RIGHT JOIN tb_comptype ON tb_complaint.comp_type = tb_comptype.type_id LEFT JOIN tb_status ON tb_complaint.comp_status = tb_status.status_id WHERE tb_complaint.comp_type='$type' AND tb_complaint.comp_id='$idcompl'";
                                                        $resultd = mysqli_query($conn, $sqld);
                                                        $rowd = mysqli_fetch_array($resultd);
                                                        echo $rowd['type_desc']; ?></td>
                                                    <td>
                                                        <?php echo $rowd['status_name'] ?>
                                                        <?php
                                                        if ($rowi['comp_status'] == '1') //pending
                                                        { ?>
                                                            &nbsp;<a class="btn btn-outline-success" href="completestatus.php?id=<?php echo $rowi['comp_id']; ?>"><i class="fa fa-circle-check fa-lg"></i></a> <?php
                                                                                                                                                                                                            } else //confirmed
                                                                                                                                                                                                            { ?>
                                                            &nbsp;<a class="btn btn-outline-danger" href="pendingstatus.php?id=<?php echo $rowi['comp_id']; ?>"><i class="fa fa-circle-xmark fa-lg"></i></a> <?php

                                                                                                                                                                                                            } //end else status 
                                                                                                                                                                                                        } //end while
                                                                                                                                                                                                                ?> </td>
                                                </tr> <?php
                                                    } //end else (usertype)
                                                        ?>

                                            <!-- tambahkan complaint pasal lampu isyarat untuk officer lampu-->


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