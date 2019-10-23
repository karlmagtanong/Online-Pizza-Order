<?php 
include('db_conf.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Pizza Order</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="pizzaico.ico" />
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand" href="#"><img src="pizza.png" alt="Smiley face" height="42" width="42"></a>

		<!-- Links -->
		<ul class="navbar-nav">
			<!-- Dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Order Pizza
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="classic.php?pizzaid=1">Classic Pizza</a>
					<a class="dropdown-item" href="specialty.php?pizzaid=8">Specialty Pizza</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="admin.php">Admin page</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="dailysales.php">Daily Sales</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="toppingsreport.php">Toppings Report</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pizzasize.php">Pizza Size Report</a>
			</li>

			
		</ul>
	</nav>
	<br>


	<div class="container">
		<div class="jumbotron">
			<h1 class="display-4">Hello, Pizzanatics!</h1>
			<p class="lead">This is just simple online ordering system, where you can order your favourite combination of pizza together with extra toppings that may satisfy you. </p>
			<hr class="my-4">
			<p style="font-size:16px">This system can insert orders to database and generate simple reports. Also note that you can't crosspick classic pizza to specialty pizza when order is still in cart.</p>
			<p>You can demo this system by choosing the menu above;</p>
			<p style="margin-left:20px;text-size:12px">• <strong>ORDER PIZZA</strong> - You can select from <strong>classic pizza</strong> or <strong>specialty pizza</strong> with your own combination.</p>
			<p style="margin-left:20px;text-size:12px">• <strong>ADMIN PAGE</strong> - In this module, you can see all the orders that the customer checked-out.</p>
			<p style="margin-left:20px;text-size:12px">• <strong>DAILY SALES</strong> - You can also see your total sales in this Daily Sales module.</p>
			<p style="margin-left:20px;text-size:12px">• <strong>TOPPINGS REPORT</strong> - There's also a report which you can identify the top favourite toppings based on customer order.</p>
			<p style="margin-left:20px;text-size:12px">• <strong>PIZZA SIZE REPORT</strong> - This is the report where you can determine the most ordered pizza size.</p>
			
		</div>
	</div>

</body>
</html>
