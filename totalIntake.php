<?php
		require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Total Intake</title>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<?php
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	?>
	<?php	
		echo "<p>Total Intake for Attendees</p>";
		echo "<table><tr><th>$ Total Intake</th></tr>";
		$sql = "select sum(attending_rate) from Attendees ";
		$stmt = $pdo->prepare($sql);
		$stmt -> execute();
		while ($row = $stmt->fetch()) {
			$attendeeMoney = $row["sum(attending_rate)"];
			echo "<tr><td>".$row["sum(attending_rate)"]."</td></tr>";
		}
		echo "</table>";
		
		echo "<p>Total Intake for Sponsors</p>";
		echo "<table><tr><th>$ Total Intake</th></tr>";
		$sql = "select sum(amount_of_money) from Company ";
		$stmt = $pdo->prepare($sql);
		$stmt -> execute();
		while ($row = $stmt->fetch()) {
			$sponsorMoney = $row["sum(amount_of_money)"];
			echo "<tr><td>".$row["sum(amount_of_money)"]."</td></tr>";
		}
		echo "</table>";
		
		$totalMoney = $sponsorMoney + $attendeeMoney;
		echo "<p>Total Intake</p>";
		echo "<table><tr><th>$ Total Intake</th></tr>";
		echo "<tr><td>".$totalMoney."</td></tr>";
		echo "</table>";
	?>

</body>
</html>