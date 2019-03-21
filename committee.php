<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<link href="committee.css" type="text/css" rel="stylesheet" >
</head>

<body>

<form>
	<select name = "committee">
		<option>All</option>
		<option>Program</option>
		<option>Promotion</option>
		<option>Registration</option>
	</select>
	<br>
	<button type = "submit" name = "submit" value = "submit">Submit</button>
</form>
<?php
	error_reporting(E_ERROR | E_PARSE);
	if(isset($_GET['submit'])){
		$result = $_GET['committee'];
		echo "<h2>$result Member List</h2>";
		echo "<table><tr><th>First Name</th><th>Last Name</th><th>Committee</th></tr>";
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
		switch($result){
			case All:
				$sql = "select first_name, last_name, committee_name from committee_members";
			break;
			case Program:
				$sql = "select first_name, last_name, committee_name from committee_members where committee_name = 'Program'";
			break;
			case Promotion:
				$sql = "select first_name, last_name, committee_name from committee_members where committee_name = 'Promotion'";
			break;
			case Registration:
				$sql = "select first_name, last_name, committee_name from committee_members where committee_name = 'Registration'";
			break;
		}
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute();   #bind the parameters
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["committee_name"]."</td></tr>";
		}		
	}
?>
</body>

</html>	