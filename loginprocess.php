<?php
//Start session
session_start();


include("dbconnect.php");

$fuser = $_POST['fuser'];
$fpwd = $_POST['fpwd'];

$sql1 = "SELECT * FROM user WHERE username = '$fuser'"; //username exist ke tak
$result1 = mysqli_query($conn, $sql1); // run statement $sql1
$row1 = mysqli_fetch_array($result1);
$count1 = mysqli_num_rows($result1);

if($count1 > 0) //username wujud
{
    if($fpwd == $row1['password']) //kalau password betul
    {
        $_SESSION['fuser'] = session_id();
        $_SESSION['fuser'] = $fuser;
        header('Location: homepage.php'); //page lepas login

    }
    else
    {
        header("Location: loginpage.php?invalid=true");
    }
}
else //username tak wujud
{
    header("Location: loginpage.php?takde=true");
}


/*
$result = $sql->get_result();
if($row = $result->fetch_assoc())    //user found
{

  if($fpwd=='admin')
  {
    $_SESSION['fusername'] = session_id();
    $_SESSION['fusername'] = $fusername;
    header('Location: carAdmin.php');         //admin
  }

  else
  {
    $pass= password_verify($fpwd, $row['us_pass']);
    if($pass)
    {
      $_SESSION['fusername'] = session_id();
      $_SESSION['fusername'] = $fusername;
      header('Location: car.php');         //customer
    }

    else
    {
      header("Location: loginpage.php?invalid=true");
    }
  }
}

  
else
{
  header("Location: loginpage.php?err=true");
}
  

//Close database connection
mysqli_close($conn);

?>

*/
 