<?php
	require 'connection.php';
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adding Attendee</title>
</head>
<body>
	<h2>New Attendee Information</h2>	
	<p>Please select your type</p>
	<form action="" method="post">
		<table >
			<tr>
				<td>Select type</td>
				<td>
					<select name = "attendeetype" method = "post">
						<?php
							$sql = "select attendee_type from attendee_type";
							$stmt = $pdo->prepare($sql);   #create the query
							$stmt->execute();   #bind the parameters
							while ($row = $stmt->fetch()) {	
								echo "<option>$row[attendee_type]</option>";
							}
						?>
				</td>
			</tr>
		</table>
		<button type = "submit" name = "submit" value = "submit">submit</button>
	</form> 	
</body>
<?php
	if(isset($_POST['submit'])){
		$attendeetype = $_POST['attendeetype'];
		if($attendeetype == professional){
			header('location: professional.php');
		}
		elseif($attendeetype == 'student'){
			header('location: student.php');
		}
		elseif($attendeetype == 'sponsor'){
			header('location: sponsor.php');
		}
	}
?>
