<!DOCTYPE html>
<html>
<head>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>

<h2>Create a New Session</h2>
<form action="" method="post">
	<table>
			<tr>
				<td>Session Date</td>
				<td><input type="date" name="date" required></td>
			</tr>
			<tr>
				<td>Session Start Time</td>
				<td><input type="time" name="startTime" required></td>
			</tr>
			<tr>
				<td>Session End Time</td>
				<td><input type="time" name="endTime" required></td>
			</tr>
			<tr>
				<td>Speaker ID</td>
				<td><input type="text" name="speakerID" required></td>
			</tr>
			<tr>
				<td>Speaker First Name</td>
				<td><input type="text" name="firstName" required></td>
			</tr>
			<tr>
				<td>Speaker Last Name</td>
				<td><input type="text" name="lastName" required></td>
			</tr>
			<tr>
				<td>Session ID</td>
				<td><input type="text" name="sessionID" required></td>
			</tr>
			<tr>
				<td>Session Name</td>
				<td><input type="text" name="sessionName" required></td>
			</tr>
			<tr>
				<td>Session Building</td>
				<td><input type="text" name="building" required></td>
			</tr>
			<tr>
				<td>Room Number</td>
				<td><input type="text" name="roomNum" required></td>
			</tr>
	</table>
	<br><br>	<button type = "submit" name = "submit" value = "submit">Add</button><br><br>
</form>

<?php
		if(isset($_POST['submit'])){
			$sessionID = $_POST['sessionID'];
			$startTime = $_POST['startTime'];
			$endTime = $_POST['endTime'];
			$speakerID = $_POST['speakerID'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$sessionName = $_POST['sessionName'];
			$building = $_POST['building'];
			$roomNum  = $_POST['roomNum'];
			$sessionDate = $_POST['date'];
	
			try{
				$sql = "INSERT INTO Conference_Schedule (date, start_time, end_time, speaker_id, speaker_front_name, speaker_last_name, section_id, section_name, building, room_num) 
				VALUES ('$sessionDate','$startTime','$endTime','$speakerID', '$firstName', '$lastName', '$sessionID', '$sessionName', '$building', '$roomNum')";
				$stmt= $pdo->prepare($sql);
				$stmt->execute();
				echo"<p>Done</p>";
			}
			catch(PDOException $e){
				echo"<p>INVALID, already inside the database, please re-input</p>";
			}
			
		}
	?>
	
</body>
</html>