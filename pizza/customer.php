<?php 
include('db_conf.php');

session_start();

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
		<li><a href="classic.php?pizzaid=1">Classic</a></li>
		<li><a href="#news">Specialty</a></li>
		
	</ul>

</body>

</html>
