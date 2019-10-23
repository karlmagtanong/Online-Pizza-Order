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
	
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand" href="#"><img src="pizza.png" alt="Smiley face" height="42" width="42"></a>

		<!-- Links -->
		<ul class="navbar-nav">
			<!-- Dropdown -->
			<li class="nav-item dropdown active">
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

		<h2>CONFIRM ORDER</h2>
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



		function getToppings($conn,$id){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT * FROM pizza_toppings  where toppings_code = '".$_SESSION["mobileno"]."' and toppings_variant = '".$id."' ");
			while($row = mysqli_fetch_assoc($result)){

				echo getName($conn,$row['toppings_option']) ." - P ".$row['toppings_price'];
				echo "<br>";
			}

		}

		function getToppingsSum($conn,$id){

			$infoextra = array();
			$result = mysqli_query($conn, "SELECT sum(toppings_price) as toppings_price FROM pizza_toppings where toppings_code = '".$_SESSION["mobileno"]."' and toppings_variant = '".$id."' ");
			while($row = mysqli_fetch_assoc($result)){

				return intVal($row['toppings_price']);

			}

		}
		?>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Variant</th>
					<th scope="col">Size</th>
					<th scope="col">Type</th>
					<th scope="col">Toppings</th>
					<th scope="col">Quantity</th>
					<th scope="col">Total Toppings Price</th>
					<th scope="col">Total Pizza Price</th>
					<th scope="col">Total Price</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>

<!-- 
				<table>
					<thead>
						<th><strong>Pizza Variant</strong></th>
						<th><strong>Pizza Size</strong></th>
						<th><strong>Pizza Type</strong></th>
						<th><strong>Pizza Toppings</strong></th>
						<th><strong>Pizza Qty</strong></th>
						<th><strong>Total Toppings Price</strong></th>
						<th><strong>Total Pizza Price</strong></th>
						<th><strong>TOTAL PRICE</strong></th>
						<th><strong>Remove</strong></th>
					</thead> -->

					<?php  



					$infoextra = array();
					$inf = "";
					$inftotal = 0.0;
					$result = mysqli_query($conn, "SELECT * FROM pizza_order where order_code = '".$_SESSION["mobileno"]."' and order_status = 0");

					while($row = mysqli_fetch_assoc($result)){

						$inf = $row['order_variant'];
						$inftotal += $row['order_price'] + getToppingsSum($conn, $row['order_variant']);
						?>

						<tr>
							<td><?php echo getName($conn, $row['order_variant'])?></td>
							<td><?php echo getSize($row['order_size'])?></td>
							<td><?php echo getTypee($row['order_category'])?></td>
							<td><?php getToppings($conn, $row['order_variant'])?></td>
							<td><?php echo $row['order_qty']?></td>
							<td><?php echo getToppingsSum($conn, $row['order_variant']) ?></td>
							<td><?php echo $row['order_price'] ?></td>
							<td style="font-weight: bold"><?php echo $row['order_price'] + getToppingsSum($conn, $row['order_variant']) ?></td>
							<td>
								<form action='delete.php' method="post">
									<input type="hidden" name="rowid" value="<?php echo $row['order_id']; ?>">
									<input type="hidden" name="rowidclasssss" id="rowidclasssss" value="<?php echo $_GET['class']; ?>">
									<button type="submit" name="submit" class="btn btn-danger">x</button></td>
								</form>


							</tr>


							<?php



						} ?>

						<input type="hidden" name="rowidclass" id="rowidclass" value="<?php echo $_GET['class']; ?>">
					</tbody>
					<tfoot>
						<tr>
							<td colspan="7"><strong>TOTAL</strong></td>
							<td ><strong><div style="height: 50px;
							width: 100px;
							display: table-cell;
							text-align: center;
							vertical-align: middle;
							border-radius: 50%;
							background: yellow;"><?php echo $inftotal ?></div></strong></td>
						</tr>
					</tfoot>
				</table>

				<?php if($inf == "" || $inf == null){?>
					<h1>You need to add your order to cart first before proceeding to checkout. Thank you</h1>
					<button onclick="changetab()" class="btn btn-danger btn-lg">BACK</button>
				<?php }else{  ?>

					<button onclick="changetab()" class="btn btn-primary btn-lg">ADD MORE PIZZA</button>
					<button onclick="confirmorder()" class="btn btn-success btn-lg">CONFIRM ORDER</button>


				<?php } ?>

			</div>

			<script>

				var mobn = '<?php echo $_SESSION["mobileno"] ?>'

				if($("#rowidclass").val() != ""){

					var classes = '<?php echo $_GET["class"] ?>';

				}else{

					var classes = '';
				}			




				function changetab(){

					if(classes == 8){

						location.href = "http://localhost/pizza/specialty.php?pizzaid=8"
					}else{

						location.href = "http://localhost/pizza/classic.php?pizzaid=1"	
					}



				}

				function confirmorder(){

					location.href = "http://localhost/pizza/confirm.php?class="+classes

				}


			</script>
		</body>

		</html>
