<?php 
session_start();
include "../logoNtitle.php";
include "../home.parts/logged_button.php";
?>

<?php
	$username  = "root";
	$pass ="";
	$serveraddr="localhost";
	$dbname="zfwdb";

		$conn = new mysqli($serveraddr, $username, $pass, $dbname);

		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}	
		
		//$stmt = "INSERT INTO `cafe` (`Cafe_id`, `Name`, `pass`) VALUES ('121', '121', '1212')";
		
		$t_id= rand();
		$fid=$_POST['foodId'];
		$cid = $_POST['cafeId'];
		$uid= $_SESSION['user'];

		$stmt = "INSERT INTO `token` (`token_id`,`f_id`, `c_id`,`u_id`) VALUES ('$t_id', '$fid', '$cid','$uid')";

		//echo $stmt;
		
		if ($conn->query($stmt) === TRUE) {
   			echo '<div class="jumbotron jumbotron-fluid" style="background-image: url(home.parts/image/test.jpg);">
				<h3> Successfully Buied up </h3>
				
			</div>';

			$update = "UPDATE food SET itemleft=(itemleft-1) WHERE f_id=$fid";
			$conn-> query($update);

		
		} else {
    		//echo "Error: " . $stmt . "<br>" . $conn->error;
    		echo "Sorry Try again!";
		}

		$conn->close();




?>



<?php include "../footer.php" ?>