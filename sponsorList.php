<?php
		require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Sponsors List</title>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<?php
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	?>
	<?php	
		echo "<p><h1>Sponsors List with Level of Sponsorship</h1></p>";
		echo "<table><tr><th>company_name</th><th>sponsor_level</th></tr>";
		$sql = "select company_name, sponsor_level from Company";
		$stmt = $pdo->prepare($sql);
		$stmt -> execute();
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["company_name"]."</td><td>".$row["sponsor_level"]."</td></tr>";
		}
	?>

</body>
</html>
