<?php
	require 'connection.php';
?>
<html>
<head>
<link href="webpage.css" type="text/css" rel="stylesheet" >
</head>

<body>
<h1>Session schedule modifier</h1>
<p>Please select the session you want to modify and enter new information in text boxes</p>
<form action = "changeSessionInfo.php" method = "post">
	<select name = "sessionid" method = "post">
		<option>Choose Session	ID</option>
		<?php
			$sql = "select section_id from Conference_Schedule";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute();   #bind the parameters
			while ($row = $stmt->fetch()) {	
				echo "<option>$row[section_id]</option>";
			}
		?>
	</select>
	<br>
	<button type = "submit" name = "submit" value = "submit">Submit</button>
</form>
<?php
	if(isset($_POST['submit'])){
		$result = $_POST['sessionid'];
		echo "<h2>$result Session Information</h2>";
		echo "<table><tr><th>Session Name</th><th>Session ID</th><th>Session Date</th><th>Start Time</th><th>End Time</th><th>Speaker's Last Name</th>
		<th>Building</th><th>Room Number</th></tr>";
			$sql = "select section_name, section_id, date, start_time, end_time, speaker_last_name, from committee_members, building, room_num where 
			section_id = ? ";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$result]);   #bind the parameters
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["section_name"]."</td><td>".$row["section_id"]."</td><td>".$row["date"]."</td><td>".$row["start_time"]."</td><td>".
			$row["end_time"]."</td><td>".$row["speaker_last_name"]."</td><td>".$row["building"]."</td><td>".$row["room_num"]."</td></tr>";
		}		
	}
?>
</body>

</html>	
