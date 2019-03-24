<!DOCTYPE html>
<html>
<head>
	<title>Conference Management System</title>
	<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<h1>Conference Management System</h1>
	<p>&copy; Group 60<p>
	<?php
	session_start();

	if(isset($_SESSION['username'])) {
		echo "Welcome <strong>".$_SESSION['username']."</strong><br/>";
	} 
	else {
		header('location: login.php');
	}
	?>
	<p>Please select the following option</p>
	<table >
		<tr>
			<td><a href="http://localhost/Hotel_Room.php">Attendants Infomation</a></td>
			<td><a href="http://localhost/Hotel_Room.php">Company Information</a></td>
			<td><a href="http://localhost/Hotel_Guest_Info.php">Hotel Guest Information</a></td>
			<td><a href="http://localhost/Hotel_Guest_Info.php">Committee Information</a></td>
		</tr>
		<tr>
			<td><a href="http://localhost/Hotel_Room.php">Attendants Infomation</a></td>
			<td><a href="http://localhost/Hotel_Room.php">Company Information</a></td>
			<td><a href="http://localhost/Hotel_Guest_Info.php">Hotel Guest Information</a></td>
			<td><a href="http://localhost/Hotel_Guest_Info.php">Committee Information</a></td>
		</tr>
	</table>
	<br>
	<a href="logout.php">Logout</a>
	<br>
	<?php
		date_default_timezone_set("America/New_York");
		echo "Last update time: " . date("h:i:sa");
	?>

</body>

</html>