<?php
	
	require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel Guest Information</title>
	<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<h2>Hotel Guest Information</h2>
	<p>Please select the room number, or select 'All Room' to show guest list.</p>
	<form action="Hotel_Guest_Info.php" method="post">
		<select name = "Room" method = "post">
			<option>All Room</option>
			<?php
				$sql = "select room_number from hotel_room";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute();   #bind the parameters
				while ($row = $stmt->fetch()) {	
					echo "<option>$row[room_number]</option>";
				}
			?>
		</select>
		<br>
		<button type = "submit" name = "submit" value = "submit">Submit</button>
	</form>
	

	<br>
	<a href = "main.php">Main Manu</a>
	<a href="logout.php">Logout</a>
	<?php
		if(isset($_POST['submit'])){
			$result = isset($_POST['Room'])?$_POST['Room']:'';
			if ($result == 'All Room'){	
				echo "<h2>$result Guest List</h2>";
				echo "<table><tr><th>First Name</th><th>Last Name</th><th>Room Number</th></tr>";
				$sql = "select first_name, last_name, room_number from students";
				$stmt = $pdo->prepare($sql);
				$stmt -> execute();
				while ($row = $stmt->fetch()) {
					echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["room_number"]."</td></tr>";
				}
			}
			else{
				echo "<p>$result Member List</p>";
				echo "<table><tr><th>First Name</th><th>Last Name</th></tr>";
				$sql = "select first_name, last_name,room_number from students where room_number = ?";
				$stmt = $pdo->prepare($sql);
				$stmt -> execute([$result]);
				while ($row = $stmt->fetch()) {
					echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td></tr>";
			}
			}
		}
	?>


</body>

</html>