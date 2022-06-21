<?php
//Start session
 include ('complaintsession.php');
  if(!session_id())
  {
    session_start();
  }
include('dbconnect.php');
 
$fusername = $_POST['fusername'];
$fpwd = $_POST['fpwd'];
$fname = $_POST['fname'];
$fphone = $_POST['fphone'];
$femail = $_POST['femail'];
$ftype = $_POST['ftype'];

$sql2 = "SELECT * FROM user WHERE username = '$fusername'"; //username exist ke tak
$result2 = mysqli_query($conn, $sql2); // run statement $sql1
$row2 = mysqli_fetch_array($result2);
$count2 = mysqli_num_rows($result2);

if($count2 > 0) //username dah diguna
{
    echo "<script> alert('Username has been taken! Please use a different username ');window.location.href = 'officerform.php'</script>";
     
}
else
{
    $sql1 = "INSERT INTO user (username, password, name, phone, email, role) 
VALUES ('$fusername','$fpwd','$fname','$fphone','$femail','$ftype')"; //status: pending
$result1 = mysqli_query($conn, $sql1);

    if($result1)
    {
        echo "<script> alert('Officer registered! ');window.location.href = 'homepage.php'</script>";
    //header("Location: homepage.php?success=true");
    }
    else
    {
        echo "<script> alert('Failed to register officer! ');window.location.href = 'homepage.php?fail=true'</script>";

    }
}




mysqli_close($conn);

?>