<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="pizzaico.ico" />


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
				Your pizza has been confirmed
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


	// header("location:classic.php?pizzaid=".$_POST['idpizza']);   
	// $_SESSION["fullname"] = $_POST['fullname'];
	// $_SESSION["mobileno"] = $_POST['mobile'];

	// echo $_SESSION['fullname'];
	// echo "<br>";
	// echo $_SESSION['mobileno'];


$link = mysqli_connect("localhost", "root", "vertrigo", "pizza_order");

if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "UPDATE pizza_order SET order_status = 1 where order_code = '".$_SESSION['mobileno']."'";

if(mysqli_query($link, $sql)){
	echo "<script>  document.getElementById('cl2').click();</script>";
	session_destroy();
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}




mysqli_close($link);



?>

<script>


	function relo(){

		if('<?php echo $_GET['class']?>' == 8){
			location.href = "http://localhost/pizza/specialty.php?pizzaid=8"

		}else{
			location.href = "http://localhost/pizza/classic.php?pizzaid=1"
		}

	}
	




</script>