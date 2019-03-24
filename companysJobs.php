<?php
		require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Company's Job List</title>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>
<body>
	<h2>Job List by Company</h2>
	<p>Please select the company to show the available jobs from that company.</p>
	<?php
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	?>
	<form action="companysJobs.php" method="post">
		<select name = "company_name" method = "post">
			<?php
				$sql = "select distinct company_name from Job_Post";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute();   #bind the parameters
				while ($row = $stmt->fetch()) {	
					echo "<option>$row[company_name]</option>";
				}
			?>
		</select>
		<br>
		<button type = "submit" name = "submit" value = "submit">Submit</button>
	</form>
	<?php
		if(isset($_POST['submit'])){
			$result = isset($_POST['company_name'])?$_POST['company_name']:'';
			
			
			echo "<p>$result Job List</h2></p>";
			echo "<table><tr><th>job_id</th><th>title</th><th>city</th><th>province</th><th>pay_rate</th><th>company_name</th></tr>";
			$sql = "select job_id, title, city, province, pay_rate, company_name from Job_Post where company_name = ?";
			$stmt = $pdo->prepare($sql);
			$stmt -> execute([$result]);
			while ($row = $stmt->fetch()) {
				echo "<tr><td>".$row["job_id"]."</td><td>".$row["title"]."</td><td>".$row["city"]."</td><td>".$row["province"]."</td><td>".$row["pay_rate"]."</td><td>".$row["company_name"]."</td></tr>";
			}
		}
	?>

</body>
</html>