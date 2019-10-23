	<?php
	include('db_conf.php');


	session_start();

	if($_POST['rowidclasssss'] == 8){

		header("location:checkout.php?class=8");   
	}else{
		header("location:checkout.php?class=");   
	}

	
	// $_SESSION["fullname"] = $_POST['fullname'];
	// $_SESSION["mobileno"] = $_POST['mobile'];

	// echo $_POST['fullname'];
	// echo "<br>";
	// echo $_POST['mobile'];


	//echo "rate = " . $_POST["rowid"];


	$link = mysqli_connect("localhost", "root", "vertrigo", "pizza_order");

// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

// Attempt delete query execution
	$sql = "DELETE FROM pizza_order WHERE order_id= ".$_POST["rowid"]." ";
	if(mysqli_query($link, $sql)){
		echo "Records were deleted successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}

	

// Close connection
	mysqli_close($link);




	?>