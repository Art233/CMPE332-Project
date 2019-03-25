<?php
		require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Conference Schedule</title>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<h2>Conference Schedule by Date</h2>
	<p>Please select the date to show the conference schedule on that day.</p>
	<?php
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	?>
	<form action="conferenceSchedule.php" method="post">
		<select name = "date" method = "post">
			<?php
				$sql = "select distinct date from Conference_Schedule";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute();   #bind the parameters
				while ($row = $stmt->fetch()) {	
					echo "<option>$row[date]</option>";
				}
			?>
		</select>
		<br>
		<button type = "submit" name = "submit" value = "submit">Submit</button>
	</form>
	<?php
		if(isset($_POST['submit'])){
			$result = isset($_POST['date'])?$_POST['date']:'';
			
			
			echo "<p>$result Conference Schedule</h2></p>";
			echo "<table><tr><th>section_name</th><th>section_id</th><th>start_time</th><th>end_time</th><th>speaker_front_name</th><th>speaker_last_name</th></tr>";
			$sql = "select section_name, section_id, start_time, end_time, speaker_front_name, speaker_last_name from Conference_Schedule where date = ?";
			$stmt = $pdo->prepare($sql);
			$stmt -> execute([$result]);
			while ($row = $stmt->fetch()) {
				echo "<tr><td>".$row["section_name"]."</td><td>".$row["section_id"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["speaker_front_name"]."</td><td>".$row["speaker_last_name"]."</td></tr>";
			}
		}
	?>

</body>
</html>
