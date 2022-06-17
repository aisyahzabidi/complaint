<?php
	if(!session_id())
	{
		session_start();
	}


	if(isset($_SESSION['fuser']) != session_id())
	{
		header('Location: login.php');
	}

?>