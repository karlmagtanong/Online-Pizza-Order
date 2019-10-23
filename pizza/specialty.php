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
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Order Pizza
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item " href="classic.php?pizzaid=1">Classic Pizza</a>
					<a class="dropdown-item active" href="specialty.php?pizzaid=8">Specialty Pizza</a>
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

	<?php 
	if(isset($_SESSION['mobileno'])){

		$fname = $_SESSION["fullname"];
		$mobn = $_SESSION["mobileno"];
		$add = $_SESSION["address"];


		function validateOrder($conn,$code){

			$returnValue = "";
			$sql = "SELECT a.order_class as order_class FROM pizza_order a
			Where a.order_code = '".$code."' group by a.order_code";

			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				return $row['order_class'];
			}

		}

		//echo "--> ". validateOrder($conn,$_SESSION['mobileno']);
		if(validateOrder($conn,$_SESSION['mobileno']) == 2 || validateOrder($conn,$_SESSION['mobileno']) == ""){

			
		}else{

			echo "<script>alert('YOU CANT CROSS PICK PIZZA CLASSIFICATION')</script>";
			echo "<script>location.href = 'http://localhost/pizza/classic.php?pizzaid=1'</script>";
		}
	}else{
		$mobn = '';
		$fname = '';
		$add = '';

	}
	

	$info = array();
	$result = mysqli_query($conn, "SELECT * FROM pizza_info where info_class in (2)");
	while($row = mysqli_fetch_assoc($result)){
		$info[] = $row;

	} 

	?>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand" href="#"></a>

		<!-- Links -->
		<ul class="navbar-nav">


			<?php 
			foreach ($info as $val) {

				if($val['info_id'] == $_GET['pizzaid']){ ?>

					<li class="nav-item active">

					<?php }else{ ?>

						<li class="nav-item">

						<?php } ?>



						<a class="nav-link" href="#" onclick="changetab('?pizzaid=',<?php echo $val['info_id']?>)"><?php echo $val['info_name']?></a>

					</li>

				<?php } ?>


			</ul>
		</nav>
		<br>

		<div class="container">
			<?php 
			function getName($conn){

				$returnValue = "";
				$sql = "SELECT a.info_name as info_name FROM pizza_info a
				Where a.info_id = '".$_GET['pizzaid']."'";

				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){
					echo $row['info_name'];
				}

			}


			?>

			<!-- START OF FORM-->

			<h2><?php getName($conn) ?></h2>


			<form id="formid" action="submit.php" method="post">

				<br>
				<h5>Fill-up delivery details</h5>
				<br>

				<div class="form-group">
					<label for="fullname">Full name</label>
					<input type="text" name="fullname" id="fullname" class="form-control">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" id="address" class="form-control">
				</div>
				<div class="form-group">
					<label for="mobile">Mobile No</label>
					<input type="text" name="mobile" id="mobile" class="form-control">
				</div>

				<br>
				<hr style="border:1px solid gray">
				<br>



				<h5>Please Select Your Combination</h5>

				<br>



				<table width="100%">
					<tr>
						<td style="vertical-align: top;width: 500px">


							<h7>Pizza Size</h7><br><br>

							<div class="form-check">
								<input type="radio" id="10in" name="choose" value=1 class="form-check-input">
								<label for="10in" class="form-check-label">10 inch</label>
							</div>
							<div class="form-check">
								<input type="radio" id="14in" name="choose" value=2 class="form-check-input">
								<label for="14in" class="form-check-label">14 inch</label>
							</div>
							<div class="form-check">
								<input type="radio" id="18in" name="choose" value=3 class="form-check-input">
								<label for="18in" class="form-check-label">18 inch</label>
							</div>

							<br>
							<h7>Pizza Type</h7><br><br>

							<div class="form-check">
								<input type="radio" id="whole" name="choose2" value=1 class="form-check-input">
								<label for="whole" class="form-check-label">Whole</label>
							</div>
							<div class="form-check">
								<input type="radio" id="half" name="choose2" value=2 class="form-check-input">
								<label for="half" class="form-check-label">Half-half</label>
							</div>
							<div class="form-check">
								<input type="radio" id="quarters" name="choose2" value=3 class="form-check-input">
								<label for="quarters" class="form-check-label">4-Quarters</label>
							</div>

							

							<br>

							<div class="form-group col-md-6">
								<label for="qty">Quantity</label>
								<input type="text" name="qty" id="qty" class="form-control">
							</div>

							<div class="row" style="display: none">

								<h7>Quantity</h7>
								<br>
								<input type="text" name="idpizza" value=<?php echo $_GET['pizzaid']?>>
							</div>
							<div class="row" style="display: none">

								<h7>Quantity</h7>
								<br>
								<input type="text" name="pizzaclass" id="pizzaclass" value=2>
							</div>
						</td>
						<td style="vertical-align: top">
							<h7>Toppings</h7><br><br>

							<?php  

							$infoextra = array();
							$result = mysqli_query($conn, "SELECT * FROM pizza_info where info_class in (3)");
							while($row = mysqli_fetch_assoc($result)){
								$infoextra[] = $row;



							}

							foreach ($infoextra as $value) {

								?>


								<input type="checkbox" id="<?php echo $value['info_name'] ?>" name="extra[]" value="<?php echo $value['info_id'] ?>">
								<label for="<?php echo $value['info_name'] ?>"><?php echo $value['info_name'] ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-plus price">&nbsp;&nbsp;</i>
								</label>
								<br>
							<?php } ?>

						</td>
					</tr>

				</table>
				<br>

				<div class="form-inline">
					<div class="col-md-6">
						<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block ">ADD TO CART</button>
					</div>
					<div class="col-md-6">
						<button type="button" onclick="checkout()" class="btn btn-success btn-lg btn-block">CHECKOUT</button>	
					</div>
				</div>
				<br>	<br>

			</form>

		</div>
		<script>


			var flag = '<?php echo $mobn ?>';



			if (flag != ''){

				var fulln = '<?php echo $fname ?>';
				var mobn = '<?php echo $mobn ?>';
				var address = '<?php echo $add ?>';

				$("#fullname").val(fulln)
				$("#mobile").val(mobn)
				$("#address").val(address)

			}



			var servname = '<?php echo $_SERVER["SERVER_NAME"] ?>';
			var requri = '<?php echo $_SERVER["REQUEST_URI"] ?>';


			function changetab(name, id){

				window.location.replace('?pizzaid=' + id);

			}


			function submitdata(){



		// //	alert("asdasd")
		

		// $.ajax({
		// 	type: "POST",
		// 	url: 'submit.php',
		// 	data: $("#form").serialize(),
		// 	dataType: 'JSON',
		// 	success: function(response) {
  //         //success message mybe...
  //         console.log(response)
  //     }
  // });


  var datastring = $("#formid").serialize();
  $.ajax({
  	type: "POST",
  	url: "submit.php",
  	data: datastring,
  	dataType: "json",
  	success: function(data) {
        //var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
        // do what ever you want with the server response
        console.log(data)
    },
    error: function(xhr, status, error){
    	console.log(error,status,xhr);
    }
});
}

function checkout(){

	location.href = "http://localhost/pizza/checkout.php?class=8"
}

</script>
</body>

</html>
