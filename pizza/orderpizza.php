<?php 
include('db_conf.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}

	li {
		float: left;
	}

	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover {
		background-color: #111;
	}
</style>
</head>
<body>

	<ul>
		<li><a href="classic.php?pizzaid=1">Classic Pizza</a></li>
		<li><a href="specialty.php?pizzaid=8">Specialty Pizza</a></li>
		<li><a href="admin.php">Admin page</a></li>
		<li><a href="dailysales.php">Daily Sales</a></li>
		<li><a href="toppingsreport.php">Toppings Report</a></li>
		<li><a href="pizzasize.php">Pizza Size Report</a></li>F
		
	</ul>

</body>

</html>
