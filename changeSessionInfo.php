<?php
		require 'connection.php';
?>
<html>
<head>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>

<body>

<h1>Session schedule modifier</h1>
<p>Please select the session you want to modify and enter new information in text boxes</p>
<?php
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
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
<h2>Session Information</h2>
<table>
<tr>
<td>Session Name</td><td>Session Date</td><td>Start Time</td><td>End Time</td><td>Speaker's Last Name</td><td>Building</td><td>Room</td>
</tr>
<?php
	if(isset($_POST['submit'])){
			$result = $_POST['sessionid'];
			$sql = "select section_name, date, start_time, end_time, speaker_last_name, building, room_num from 
			Conference_Schedule where section_id = ? ";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$result]);   #bind the parameters
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["section_name"]."</td><td>".$row["date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["speaker_last_name"]."</td><td>".$row["building"]."</td><td>".$row["room_num"]."</td></tr>";
		}
		echo "</table>";
	}
?>



<form action="" method="post">
	<table>
			<tr>
				<td>Session ID</td>
				<td><input type="text" name="id" required></td>
			</tr>
			<tr>
				<td>New session date</td>
				<td><input type="text" name="day" required></td>
			</tr>
			<tr>
				<td>New start time</td>
				<td><input type="text" name="startTime" required></td>
			</tr>
			<tr>
				<td>New end time</td>
				<td><input type="text" name="endTime" required></td>
			</tr>
			<tr>
				<td>New building</td>
				<td><input type="text" name="building" required></td>
			</tr>
			<tr>
				<td>New room</td>
				<td><input type="text" name="room" required></td>
			</tr>
	</table>
	<button type = "submit" name = "submit" value = "submit">Update</button><br><br>
</form>

<?php
		if(isset($_POST['submit'])){
			$section_id = $_POST['id'];
			$date = $_POST['day'];
			$start_time = $_POST['startTime'];
			$end_time = $_POST['endTime'];
			$building = $_POST['building'];
			$room_num = $_POST['room'];
			echo "$section_id";
			
			try{
				$sql = "UPDATE conference_schedule SET date = '$date', start_time = '$start_time', end_time = '$end_time', building = '$building', room_num = '$room_num' where section_id = '$section_id'";
				$stmt= $pdo->prepare($sql);
				$stmt->execute();
				echo"<p>Done</p>";
			}
			catch(PDOException $e){
				echo"<p>INVALID!</p>";
			}
			
		}
?>
	
</body>

</html>	
