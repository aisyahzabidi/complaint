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
$result2 = mysqli_query($conn, $sql2); 
$row2 = mysqli_fetch_array($result2);
$count2 = mysqli_num_rows($result2);

 //username dah diguna
 
if($count2 > 0) 
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
        if($ftype=='3') //jalanraya
        {
            $sql3 = "INSERT INTO tb_officer (officer_username, officer_type) VALUES ('$fusername','1')";
            $result3 = mysqli_query($conn,$sql3);
            if($result3)
            {
                echo "<script> alert('Officer successfully registered! ');window.location.href = 'homepage.php'</script>";
            }
            else
            {
                echo "<script> alert('Failed to register officer! ');window.location.href = 'officerform.php'</script>";
            }
        }
        elseif($ftype=='4') //lampu isyarat
        {
            $sql4 = "INSERT INTO tb_officer (officer_username, officer_type) VALUES ('$fusername','2')";
            $result4 = mysqli_query($conn,$sql4);
            if($result4)
            {
                echo "<script> alert('Officer successfully registered! ');window.location.href = 'homepage.php'</script>";
            }
            else
            {
                echo "<script> alert('Failed to register officer! ');window.location.href = 'officerform.php'</script>";
            }

        }
        else //lampu jalan 
        {
            $sql5 = "INSERT INTO tb_officer (officer_username, officer_type) VALUES ('$fusername','3')";
            $result5 = mysqli_query($conn,$sql5);
            if($result5)
            {
                echo "<script> alert('Officer successfully registered! ');window.location.href = 'homepage.php'</script>";
            }
            else
            {
                echo "<script> alert('Failed to register officer! ');window.location.href = 'officerform.php'</script>";
            }
        }
        
    //header("Location: homepage.php?success=true");
    }
    else
    {
        echo "<script> alert('Failed to register officer! ');window.location.href = 'homepage.php?fail=true'</script>";

    }
}




mysqli_close($conn);

?>