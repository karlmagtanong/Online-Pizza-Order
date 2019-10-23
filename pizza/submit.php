<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="pizzaico.ico" />


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary cl" id="cl" data-toggle="modal" data-target="#exampleModal" style="display: none">

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header alert-danger">
				<h5 class="modal-title" id="exampleModalLabel">Error !</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="relo()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Please choose your pizza combination
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="relo()">Back</button>

			</div>
		</div>
	</div>
</div>



<button type="button" class="btn btn-primary cl2" id="cl2" data-toggle="modal" data-target="#exampleModal2" style="display: none">

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header alert-success">
				<h5 class="modal-title" id="exampleModalLabel">Success !</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="relo()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Your pizza has been added to cart
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="relo()">Back</button>

			</div>
		</div>
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary cl" id="cl3" data-toggle="modal" data-target="#exampleModal3" style="display: none">

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header alert-danger">
				<h5 class="modal-title" id="exampleModalLabel">Error !</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="relo()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Incomplete delivery details
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="relo()">Back</button>

			</div>
		</div>
	</div>
</div>



<?php

include('db_conf.php');


session_start();



$_SESSION["fullname"] = $_POST['fullname'];
$_SESSION["mobileno"] = $_POST['mobile'];
$_SESSION["address"] = $_POST['address'];

	// echo $_POST['fullname'];
	// echo "<br>";
	// echo $_POST['mobile'];
if(empty($_SESSION['fullname'])) {


	echo "<script>  document.getElementById('cl3').click();</script>";

}else
if(empty($_SESSION['mobileno'])) {


	echo "<script>  document.getElementById('cl3').click();</script>";

}else
if(empty($_SESSION['address'])) {


	echo "<script>  document.getElementById('cl3').click();</script>";

}



if(!empty($_POST['choose'])) {


	function getTDivisor($id){

		if($id == 1){

			return 1;
		}
		if($id == 2){

			return 2;
		}
		if($id == 3){

			return 4;
		}
	}

	function getSize($id){

		if($id == 1){

			return 10;
		}
		if($id == 2){

			return 14;
		}
		if($id == 3){

			return 18;
		}
	}
	function getRate($conn,$id,$size,$type,$qty){

		$returnValue = "";
		$sql = "SELECT a.rate_price as rate_price FROM pizza_rate a
		Where a.rate_variant = '".$id."' and a.rate_size = '".getSize($size)."'";

		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			return ($row['rate_price'] / getTDivisor($type) * $qty);
		}

	}

	function getRateTop($conn,$id,$size){

		$returnValue = "";
		$sql = "SELECT a.rate_price as rate_price FROM pizza_rate a
		Where a.rate_variant = '".$id."' and a.rate_size = '".getSize($size)."'";

		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			return $row['rate_price'];
		}

	}

//echo "rate = " . getRateTop($conn,$_POST["idpizza"],$_POST["choose"]);





	


	$link = mysqli_connect("localhost", "root", "vertrigo", "pizza_order");

	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$sql = "INSERT INTO pizza_order (order_code, order_variant, order_size, order_category, order_qty,order_price,order_date,order_status,order_class) VALUES ('".$_SESSION["mobileno"]."', '".$_POST["idpizza"]."', '".$_POST["choose"]."','".$_POST["choose2"]."','".$_POST["qty"]."','".getRate($conn,$_POST["idpizza"],$_POST["choose"],$_POST["choose2"],$_POST["qty"])."',NOW(),0,'".$_POST['pizzaclass']."')";
	if(mysqli_query($link, $sql)){
		//echo "<script>alert('Added to cart')</script>";
	} else{
	//	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

	}


	foreach ($_POST['extra'] as $val) {

		$sql2 = "INSERT INTO pizza_toppings (toppings_code, toppings_variant, toppings_option, toppings_price) VALUES ('".$_SESSION["mobileno"]."', '".$_POST["idpizza"]."', '".$val."','".getRateTop($conn,$val,$_POST["choose"])."')";
		if(mysqli_query($link, $sql2)){
			//echo "Records toppings inserted successfully.";
		}else{
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}

	}

	$sql3= "INSERT INTO pizza_customer (customer_code, customer_name, customer_mobile, customer_address) VALUES ('".$_SESSION["mobileno"]."', '".$_SESSION["fullname"]."', '".trim($_SESSION["mobileno"])."','".$_SESSION["address"]."')";
	if(mysqli_query($link, $sql3)){
	//	echo "Records inserted successfully.";
		echo "<script>  document.getElementById('cl2').click();</script>";
	} else{
	//	echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
	}

	mysqli_close($link);

}else{

	?>


	<?php


	echo "<script>  document.getElementById('cl').click();</script>";
}



?>
<script>



	function relo()
	{

		var piiza = '<?php echo $_POST["idpizza"] ?>'
		var piizaclass = '<?php echo $_POST["pizzaclass"] ?>'


		if(piizaclass == 1){


			location.href = "http://localhost/pizza/classic.php?pizzaid="+piiza
		}
		if(piizaclass == 2){


			location.href = "http://localhost/pizza/specialty.php?pizzaid="+piiza
		}


	}


</script>


