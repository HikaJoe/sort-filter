<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>db connect</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

session_start();

  $host = "silva.computing.dundee.ac.uk";
  $username = "22ac3u07";
  $password = "ab123c";
  $db_name = "22ac3d07";

  $_SESSION['dbCon']=mysqli_connect($host,$username,$password,$db_name);

  
  // Check connection
  if ($_SESSION['dbCon']->connect_error) {
	die("Connection failed: " . $_SESSION['dbCon']->connect_error);
  }




	
?>
</body>
</html>