<!DOCTYPE html>
<html>
<head>
	<title>Display Movie Records</title>
	<style>
		body {
			text-align:center;
			background-color:rgb(232,217,243);
		}
		table.center {
			margin-left:auto;
			margin-right:auto;
		}
		tr,td {
			text-align:center;
		}
		h2 {
			text-align:center;
		}
	</style>
</head>
<body>
	<?php
		require_once('connectvars.php');
		
		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		
		$query = "SELECT * from Movies1";
		$result = mysqli_query ($dbc,$query);
		
		print "<h2>Display Movies Records</h2>";
		print "<table class=\"center\" border\"1\" width=\"75%\" cellspacing=\"2\" cellpadding=\"2\">";
		print "<tr>";
		print "<td><b>TITLE</b></td>";
		print "<td><b>PRODUCTION COMPANY</b></td>";
		print "<td><b>YEAR RELEASED</b></td>";
		print "<td><b>DIRECTOR</b></td>";
		print "</tr>";
		
		while ($Row = mysqli_fetch_array ($result)) {
			print "<tr>";
			print "<td>$Row[Title]</td>";
			print "<td>$Row[ProductionCompany]</td>";
			print "<td>$Row[YearReleased]</td>";
			print "<td>$Row[Director]</td>";
			print "</tr>";
		}
		mysqli_close ($dbc);
		print "</table>";
		$currentDate = date("l F j, Y");
		print "<br><p style=\"text-align:center\"><em>Maggie George &nbsp;&nbsp;Date: $currentDate </em></p>";
	?>
</body>
</html>
