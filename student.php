<?php
	require 'connection.php';
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html>
<head>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
<form action="" method="post">
	<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="first_name" required></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="last_name" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" required></td>
			</tr>
			<tr>
				<td>Hotel Room Number</td>
				<td><select name = "roomnum" method = "post">
						<?php
							$sql = "select room_number from hotel_room";
							$stmt = $pdo->prepare($sql);   #create the query
							$stmt->execute();   #bind the parameters
							while ($row = $stmt->fetch()) {	
								echo "<option>$row[room_number]</option>";
							}
						?>
				</td>
				</select>
			</tr>
	</table>
	<button type = "submit" name = "submit" value = "submit">Submit</button><br><br>
</form>

<?php
		if(isset($_POST['submit'])){
			$firstname = $_POST['first_name'];
			$lastname = $_POST['last_name'];
			$email = $_POST['email'];
			$roomnum = $_POST['roomnum'];
			$sql =  "select attending_rate from attendee_type where attendee_type = 'student'";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute(); 
			while ($row = $stmt->fetch()) {
				$attendingrate = $row["attending_rate"];
			}
			try{
				$sql = "INSERT INTO attendees (first_name, last_name, email,attendee_type,attending_rate) VALUES ('$firstname','$lastname','$email','student','$attendingrate')";
				$stmt= $pdo->prepare($sql);
				$stmt->execute();
				echo"<p>Done</p>";
			}
			catch(PDOException $e){
				echo"<p>INVALID, already inside the database, please re-input</p>";
			}
			
			$sql =  "select id from attendees where email = ?";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$email]); 
			while ($row = $stmt->fetch()) {
				$id = $row["id"];
			}
			try{
				$sql2 = "INSERT INTO students (id,first_name, last_name,room_number) VALUES ('$id','$firstname','$lastname','$roomnum')";
				$stmt2= $pdo->prepare($sql2);
				$stmt2->execute();
				echo"<p>Done</p>";
			}
			catch(PDOException $e){
				echo"<p>INVALID, already inside the database, please re-input</p>";
			}
			
		}
?>
</body>
</html>