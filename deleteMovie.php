<!DOCTYPE html>
<html>
<head>
<title> Deleting Movies </title>
</head>
<h3> Deleting records using PHP </h3>
<h4> Programmed by Maggie George <br/> </h4>

<?php
	require_once('connectvars.php');
	
	$TitleIN = trim($_POST['TitleIN']);
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$TableName = "Movies1";
	$query = "DELETE FROM $TableName WHERE Title = '$TitleIN' ";
   
	print ("The query is: <b>$query</b> <br/><br/>");
   
	if (mysqli_query ($dbc, $query)) {
	   
	   echo "The DELETE query was successful.";
	}
	else
	{
	   echo "The DELETE query FAILED!" . mysqli_error($dbc);
	}
   
	mysqli_close($dbc);
?>
</body>
</html>
