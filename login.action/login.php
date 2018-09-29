<?php
	

	$user=$_POST['username'];
	$pass=$_POST['pass'];
	$utype=$_POST['userType'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "zfwdb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT c_username,pass FROM cafe where c_username=$user and pass=$pass";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    //echo "USer Exists";
	    include "../logoNtitle.php";
	    include "../home.parts/logged_button.php";

	    session_start();
	    $_SESSION['user']=$user;
	    $_SESSION['pass']=$pass;
	    $_SESSION['usertype']=$utype;


	    //session_unset();
	    //session_destroy();
	} else {
	    echo '<div class="jumbotron jumbotron-fluid" style="background-image: url(home.parts/image/test.jpg);">
				<h3> YOu do not belong! </h3>
				
			</div>
		';
	}
	$conn->close();


	//include "../home.parts/logged_button.php";

?>