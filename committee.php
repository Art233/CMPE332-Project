<?php
	session_start();

	if(isset($_SESSION['username'])) {
	} 
	else {
		header('location: login.php');
	}
	require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Committee Member List</title>
<link href="web.css" type="text/css" rel="stylesheet" >
</head>

<body>
<h1>Committee Member List</h1>
<p>Please select the Sub-Committee or select 'All Committee' to show the members</p>
<form action = "committee.php" method = "post">
	<select name = "committee" method = "post">
		<option>All Committee</option>
		<?php
			$sql = "select committee_name from sub_committee";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute();   #bind the parameters
			while ($row = $stmt->fetch()) {	
				echo "<option>$row[committee_name]</option>";
			}
		?>
	</select>
	<br>
	<button type = "submit" name = "submit" value = "submit">Submit</button>
</form>
<?php
	if(isset($_POST['submit'])){
		$result = $_POST['committee'];
		echo "<h2>$result Member List</h2>";
		echo "<table><tr><th>First Name</th><th>Last Name</th><th>Committee</th></tr>";
		if($result == 'All Committee'){
			$sql = "select first_name, last_name, committee_name from committee_members order by committee_name";
			$stmt = $pdo->prepare($sql); 
			$stmt->execute();  
		}		
		else{
			$sql = "select first_name, last_name, committee_name from committee_members where committee_name = ? ";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$result]);   #bind the parameters
		}

		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["committee_name"]."</td></tr>";
		}		
	}
?>
</body>

</html>	