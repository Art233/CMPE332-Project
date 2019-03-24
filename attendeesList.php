<?php
		require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Attendees List</title>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<?php
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	?>
	<?php	
		echo "<h1>Students List</h1>";
		echo "<table><tr><th>ID</th><th>first_name</th><th>last_name</th><th>attendee_type</th></tr>";
		$sql = "select ID, first_name, last_name, attendee_type from Attendees where attendee_type = Student";
		$stmt = $pdo->prepare($sql);
		$stmt -> execute();
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["ID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["attendee_type"]."</td></tr>";
		}
		
		echo "<h2>Professionals List</h2>";
		echo "<table><tr><th>ID</th><th>first_name</th><th>last_name</th><th>attendee_type</th></tr>";
		$sql = "select ID, first_name, last_name, attendee_type from Attendees where attendee_type = Professional";
		$stmt = $pdo->prepare($sql);
		$stmt -> execute();
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["ID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["attendee_type"]."</td></tr>";
		}
		
		echo "<h3>Sponsors List</h3>";
		echo "<table><tr><th>ID</th><th>first_name</th><th>last_name</th><th>attendee_type</th></tr>";
		$sql = "select ID, first_name, last_name, attendee_type from Attendees where attendee_type = Sponsor";
		$stmt = $pdo->prepare($sql);
		$stmt -> execute();
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["ID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["attendee_type"]."</td></tr>";
		}
	?>

</body>
</html>
