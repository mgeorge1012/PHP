<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	$Title = trim($_POST['Title']);
	$ProductionCompany = trim($_POST['ProductionCompany']);
	$YearofRelease = trim($_POST['YearofRelease']);
	$Director = trim($_POST['Director']);
	
	require_once('connectvars.php');
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$query = "INSERT into Movies1 values ('0','$Title','$ProductionCompany','$YearofRelease','$Director')";
	
	print "The query is:<br>$query<br><br>";
	
	if (mysqli_query($dbc,$query)) {
		print "The query was successfully executed!<br>";
	} else {
		print "The query could not be executed!<br>";
	}
	mysqli_close ($dbc);
?>
</body>
</html>
