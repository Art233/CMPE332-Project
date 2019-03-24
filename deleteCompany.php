
<html>
<head>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>

<body>

<h1>Delete a Sponsing Company</h1>
<p>Please select the caompany you want to delete</p>
<?php
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<form action = "deleteCompany.php" method = "post">
	<select name = "company" method = "post">
		<option>Choose Company</option>
		<?php
			$sql = "select company_name from Company";
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
			$result = $_POST['company'];
			$sql = "delete from Company where company_name = ?";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$result]);   #bind the parameters
			echo"<p>Done</p>";
	}
?>


</body>

</html>	