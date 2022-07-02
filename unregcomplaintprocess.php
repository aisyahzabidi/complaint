<?php
//Start session
  
include('dbconnect.php');
 
$fname= $_POST['fdesc'];
$fage = $_POST['ftype'];
$faddress = $_POST['faddress'];
$fstate = $_POST['fstate'];
$fgender = $_POST['fgender'];
$fdesc = $_POST['fdesc'];
$ftype = $_POST['ftype'];

$sql1 = "INSERT INTO tb_complaint (comp_user, comp_desc, comp_type, comp_status) 
VALUES ('Public','$fdesc','$ftype','1')"; //status: pending
$result1 = mysqli_query($conn, $sql1);

if($result1)
{
    $sql2 = "INSERT INTO tb_public (public_name, public_age,public_address,public_state,public_gender) VALUES ('$fname','$fage','$faddress','$fstate','$fgender') ";
    $result2 = mysqli_query($conn, $sql2);
    if($result2)
    {
        echo "<script> alert('Complaint submitted! ');window.location.href = 'homepagepublic.php'</script>";
    }
    else
    {
        echo "<script> alert('Failed to save public infor! ');window.location.href = 'homepagepublic.php'</script>";
    }
    
    //header("Location: homepage.php?success=true");
}
else
{
    echo "<script> alert('Failed to submit complaint! ');window.location.href = 'homepage.php?fail=true'</script>";

}

mysqli_close($conn);

?>