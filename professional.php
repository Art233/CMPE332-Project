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

<h1>Professionals information table</h1>
<form action="" method="post">
	<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="firstname" required></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lastname" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" required></td>
			</tr>
			<tr>
				<td>Professional Specialization</td>
				<td><input type="text" name="proSpec" required></td>
			</tr>
			<tr>
				<td>Speaker?</td>
				<td><input type="radio" name="radio" value="Radio 1">NotSpeaker
				<td><input type="radio" name="radio" value="Radio 2">Speaker
			</tr>
			<button type = "submit" name = "add" value = "submit">Add</button>
</form>
<?php
		if(isset($_POST['add'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$spec = $_POST['proSpec'];
			$sql =  "select attending_rate from attendee_type where attendee_type = 'professional'";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute(); 
			while ($row = $stmt->fetch()) {
				$attendingrate = $row["attending_rate"];
			}
			try{
				$sql = "INSERT INTO attendees (first_name, last_name, email,attendee_type,attending_rate) VALUES ('$firstname','$lastname','$email','professional','$attendingrate')";
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
			echo"<p>$id</p>";
			try{
				$sql2 = "INSERT INTO professionals (id,first_name, last_name,specialization) VALUES ('$id','$firstname','$lastname','$spec')";
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