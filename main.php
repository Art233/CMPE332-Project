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
	<table>
		<tr>
		<td><a href="http://localhost/committee.php">Subcommittee Members</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/Hotel_Guest_Info.php">Hotel Room Arrangement</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/conferenceSchedule.php">Daily Conference Schedule</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/sponsorList.php">Sponsor Company Level</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/companysJobs.php">Jobs Available</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/attendeesList.php">Conference Attendees List</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/attendants.php">Add a Attendee</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/totalIntake.php">Conference Intake Breakdown</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/adding_company.php">Add a Sponsor Company</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/deleteCompany.php">Delete a Sponsor Company</a></td>
		</tr>
		<tr>
		<td><a href="http://localhost/changeSessionInfo.php">Change a Session Schedule</a></td>
		</tr>
</table>
<!-- DivTable.com -->
	<br>
	<a href="logout.php">Logout</a>
	<br>
	<?php
		date_default_timezone_set("America/New_York");
		echo "Last visit at " . date("h:i:sa");
	?>


</body>

</html>
