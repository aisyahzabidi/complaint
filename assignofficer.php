<?php


include ('complaintsession.php');
  if(!session_id())
  {
    session_start();
  }
include('dbconnect.php');

$compid = $_REQUEST['id'];
$officer =$_POST['fofficer'];

$sql1 = "UPDATE tb_complaint SET comp_officer = '$officer' WHERE comp_id = '$compid' ";
$result1 = mysqli_query($conn, $sql1);
if($result1)
{
	echo "<script> alert('Officer assigned! ');window.location.href = 'homepage.php'</script>";
}
else
{
    echo "<script> alert('Failed to assign officer! ');window.location.href = 'homepage.php?fail=true'</script>";

}

mysqli_close($conn);

?>