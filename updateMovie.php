<!DOCTYPE html>
<html>
<head>
<title>UPDATE Movie Database</title>
</head>
<body style="background-color: rgb(229,243,247);">
<h3> Updating Director Name in the Movie Database</h3>
<h4> Programmed by: Maggie George </h4>
<?php 

require_once('connectvars.php');

$TitleIN = trim($_POST['TitleIN']);
$DirectorIN = trim($_POST['DirectorIN']);

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "UPDATE Movies1 SET Director = '$DirectorIN' WHERE Title = '$TitleIN' ";

print ("The query is: <b>$query</b><br /><br />");

if (mysqli_query ($dbc, $query)) {
	echo"The UPDATE query was successful.";
	
} else {
	echo "The UPDATE failed!" . mysqli_error();
}

mysqli_close($dbc);

?>
</body>
</html>
