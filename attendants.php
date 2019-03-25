<?php
	$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendants</title>
	<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<h2>Attendants Info</h2>
	<p>Please select Attendants type, or select 'All attendants' to show all attentants</p>
	<form action="attendants.php" method="post">
	<select name = "Room" method = "post">
		<option>All Attendants</option>
		<?php
			$sql = "select room_number from hotel_room";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute();   #bind the parameters
			while ($row = $stmt->fetch()) {	
				echo "<option>$row[room_number]</option>";
			}
		?>
	

</body>

</html>