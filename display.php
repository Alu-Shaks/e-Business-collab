<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>display company</title>
</head>
<style>
	table,th,td{
		border: 1px solid black;
		border-collapse: collapse;
		padding: 8px;
	}
	table{
		margin: auto;
		width: 50%;
	}
	th{
		background-color: lightgrey;
	}
</style>
<body>
	<h1>REGISTERED COMPANIES</h1>
		<table>
			<tr>
				<th>COMPANY NAME :</th>
				<th>OWNERS NAME:</th>
				<th>COMPANY DESCRIPTION</th>
			</tr>

	<?php
	include 'connectdb.php';
	$sql="SELECT * FROM Company_Information";
	$result=mysqli_query($connect,$sql);
	if ($result) {
		// code...
	
	while($Company_Information=mysqli_fetch_assoc($result)){
		$companyID=$Company_Information['companyID'];
		$companyName=$Company_Information['companyName'];
		$owner=$Company_Information['owner'];
		$companyDescription=$Company_Information['companyDescription'];
		echo "<tr>
		<td>$companyName</td>
		<td>$owner</td>
		<td>$companyDescription</td>

		</tr>";
	}
}

	
	?>
</table>

</body>
</html>