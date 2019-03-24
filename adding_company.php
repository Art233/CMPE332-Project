<?php
	require 'connection.php';
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adding Sponsoring Company</title>
</head>
<body>
	<h2>Adding Sponsoring Company</h2>
	<p>Please add new company.</p>
	<form action="" method="post">
		<table >
			<tr>
				<td>Company Name</td>
				<td><input type="text" name="companyname" required></td>
			</tr>
			<tr>
				<td>Sponsor Level</td>
				<td>
					<select name = "level" method = "post">
						<?php
							$sql = "select sponsor_level from level_table order by total_mail";
							$stmt = $pdo->prepare($sql);   #create the query
							$stmt->execute();   #bind the parameters
							while ($row = $stmt->fetch()) {	
								echo "<option>$row[sponsor_level]</option>";
							}
						?>
				</td>
			</tr>
		</table>
		<button type = "submit" name = "submit" value = "submit">Add</button>
	</form> 
	<?php
		if(isset($_POST['submit'])){
			$companyname = $_POST['companyname'];
			$level = $_POST['level'];
			$result = isset($_POST['sponsor_level'])?$_POST['sponsor_level']:'';
			$sql = "select total_mail,amount_of_money from level_table where sponsor_level = ?";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$level]);   #bind the parameters
			while ($row = $stmt->fetch()) {
				$totalmail = $row["total_mail"];
				$amountofmoney = $row["amount_of_money"];
			}
			try
			$sql = "INSERT INTO company (company_name, sponsor_level, amount_of_money,total_mail) VALUES ('$companyname','$level','$amountofmoney','$totalmail')";
			$stmt= $pdo->prepare($sql);
			$stmt->execute();
			echo"<p>Done</p>";
		}
	?>

</body>

</html>