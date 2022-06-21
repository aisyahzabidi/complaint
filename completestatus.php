<?php 
//Start session
include ('complaintsession.php');
if(!session_id())
{
  session_start();
}
include('dbconnect.php');
$compid = $_REQUEST['id']; //dapatkan id yang homepageofficer pass

$sql1 = "UPDATE tb_complaint SET comp_status='2' WHERE comp_id = '$compid'";
$result1 = mysqli_query($conn, $sql1);

if($result1)
{
    echo "<script> alert('Status changed to completed! ');window.location.href = 'homepageofficer.php'</script>";
}
else
{
    echo "<script> alert('Failed to change status! ');window.location.href = 'homepageofficer.php'</script>";


}

mysqli_close($conn);

?>