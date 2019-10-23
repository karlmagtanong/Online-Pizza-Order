<?php 
include('db_conf.php');
session_start();
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
	


	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top-2">
		<!-- Brand -->
		<a class="navbar-brand" href="index.php"><img src="pizza.png" alt="Smiley face" height="42" width="42"></a>

		<!-- Links -->
		<ul class="navbar-nav">
			<!-- Dropdown -->
			<li class="nav-item dropdown ">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Order Pizza
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item " href="classic.php?pizzaid=1">Classic Pizza</a>
					<a class="dropdown-item" href="specialty.php?pizzaid=8">Specialty Pizza</a>
				</div>
			</li>
			<li class="nav-item active">
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

	<div class="container">
		<br>

		<h2>ADMIN PAGE</h2>
		<br>
		<?php 

		function getSize($id){

			if($id == 1){

				return '10 "';
			}
			if($id == 2){

				return '14 "';
			}
			if($id == 3){

				return '18 "';
			}
		}

		function getTypee($id){

			if($id == 1){

				return 'Whole';
			}
			if($id == 2){

				return 'Half-half';
			}
			if($id == 3){

				return '4-Quarters';
			}
		}

		function getName($conn,$id){

			$returnValue = "";
			$sql = "SELECT a.info_name as info_name FROM pizza_info a
			Where a.info_id = '".$id."'";

			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				return $row['info_name'];
			}

		}
		function getfullName($conn,$id){

			$returnValue = "";
			$sql = "SELECT a.customer_name as customer_name FROM pizza_customer a
			Where a.customer_mobile = '".$id."'";

			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				return $row['customer_name'];
			}

		}
		function getmobileno($conn,$id){

			$returnValue = "";
			$sql = "SELECT a.customer_mobile as customer_mobile FROM pizza_customer a
			Where a.customer_mobile = '".$id."'";

			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				return $row['customer_mobile'];
			}

		}
		function getAddress($conn,$id){

			$returnValue = "";
			$sql = "SELECT a.customer_address as customer_address FROM pizza_customer a
			Where a.customer_mobile = '".$id."'";

			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				return $row['customer_address'];
			}

		}



		function getToppings($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT * FROM pizza_toppings where toppings_code = '".$code."'  ");
			while($row = mysqli_fetch_assoc($result)){

				echo getName($conn,$row['toppings_option']) ;
				echo "<br>";
				echo "<hr style='border:1px solid gray'>";
			}

		}

		function getVariant($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT * FROM pizza_order where order_code = '".$code."' ");
			while($row = mysqli_fetch_assoc($result)){

				echo getName($conn,$row['order_variant']);
				echo "<br>";
				echo "<hr style='border:1px solid gray'>";
			}

		}


		function getSizes($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT * FROM pizza_order where order_code = '".$code."' ");
			while($row = mysqli_fetch_assoc($result)){

				echo getSize($row['order_size']);
				echo "<br>";
				echo "<hr style='border:1px solid gray'>";
			}

		}

		function getcategory($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT * FROM pizza_order where order_code = '".$code."' ");
			while($row = mysqli_fetch_assoc($result)){

				echo getTypee($row['order_category']);
				echo "<br>";
				echo "<hr style='border:1px solid gray'>";
			}

		}

		function getQty($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT * FROM pizza_order where order_code = '".$code."' ");
			while($row = mysqli_fetch_assoc($result)){

				echo $row['order_qty'];
				echo "<br>";
				echo "<hr style='border:1px solid gray'>";
			}

		}

		function getSumpizza($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT * FROM pizza_order where order_code = '".$code."' ");
			while($row = mysqli_fetch_assoc($result)){

				echo $row['order_price'];
				echo "<br>";
				echo "<hr style='border:1px solid gray'>";
			}
		}
		function getSumpizzas($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT sum(order_price) as order_price FROM pizza_order where order_code = '".$code."' ");
			while($row = mysqli_fetch_assoc($result)){

				return $row['order_price'];

			}
		}
		function getToppingsSum($conn,$code){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT sum(toppings_price) as toppings_price FROM pizza_toppings where toppings_code = '".$code."' ");
			while($row = mysqli_fetch_assoc($result)){

				return intVal($row['toppings_price']);

			}

		}
		?>
	<!-- 	<table>
			<thead>
				<th><strong>Full Name</strong></th>
				<th><strong>Mobile No</strong></th>
				<th><strong>Address</strong></th>
				<th><strong>Pizza Variant</strong></th>
				<th><strong>Pizza Size</strong></th>
				<th><strong>Pizza Type</strong></th>
				<th><strong>Pizza Toppings</strong></th>
				<th><strong>Pizza Qty</strong></th>
				<th><strong>Total Toppings Price</strong></th>
				<th><strong>Total Pizza Price</strong></th>
				<th><strong>TOTAL PRICE</strong></th>

			</thead> -->


			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Full Name</th>
						<th scope="col">Address</th>
						<th scope="col">Mobile No</th>
						<th scope="col">Variant</th>
						<th scope="col">Size</th>
						<th scope="col">Type</th>
						<th scope="col">Toppings</th>
						<th scope="col">Quantity</th>
						<th scope="col">Toppings Price</th>
						<th scope="col">Pizza Price</th>
						<th scope="col">Total Price</th>

					</tr>
				</thead>
				<tbody>


					<?php  



					$infoextra = array();
					$result = mysqli_query($conn, "SELECT * FROM pizza_order where order_status = 1 group by order_code ");
					while($row = mysqli_fetch_assoc($result)){
						?>

						<tr>
							<td><?php echo getfullName($conn,$row['order_code']) ?></td>
							<td><?php echo getmobileno($conn,$row['order_code']) ?></td>
							<td><?php echo getAddress($conn,$row['order_code']) ?></td>
							<td><?php echo getVariant($conn, $row['order_code'])?></td>
							<td><?php echo getSizes($conn,$row['order_code'])?></td>
							<td><?php echo getcategory($conn,$row['order_code'])?></td>
							<td><?php getToppings($conn, $row['order_code'])?></td>
							<td><?php echo getQty($conn, $row['order_code'])?></td>
							<td><?php echo getToppingsSum($conn, $row['order_code']) ?></td>
							<td><?php echo getSumpizza($conn, $row['order_code']) ?></td>
							<td><?php echo getSumpizzas($conn, $row['order_code']) + getToppingsSum($conn, $row['order_code']) ?></td>


							<?php



						} ?>

					</tbody>
				</table>
			</div>

			<script>

				var mobn = '<?php echo $_SESSION["mobileno"] ?>';


				function changetab(){

					location.href = "http://localhost/pizza/classic.php?pizzaid=1"

				}

				function confirmorder(){

					location.href = "http://localhost/pizza/confirm.php"

				}


			</script>
		</body>

		</html>
