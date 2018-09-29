<?php include "../logoNtitle.php" ?>

<?php

echo '<div class="row" style>
          <div class="col" style="float: right;">
          <button class="btn"><a href="../index.php">Home</a></button>
          <button class="btn"><a href="about.php">About</a></button>
          </div>

          <div class="col-sm-3" style="align-self: right;">
           
          
          </div>
      </div>
      ';


    $uname = $_POST['username'];
	//echo $username;
	$pass = $_POST['pass'];

	
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

	$test = "SELECT * FROM user WHERE u_username = '$uname' ";
	$result = $conn->query($test);

	
	//echo "Save Me";

	if($result->num_rows >0 )
	{
		echo '<div class="jumbotron jumbotron-fluid" style="background-image: url(home.parts/image/test.jpg);">
				<h3> The Username is already present... Please try again with different username! </h3>
				
			</div>
		';
	}
	else
	{
		$sql = "INSERT INTO user (u_username,pass)
	VALUES ('$uname', '$pass')";
		if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		echo '<div class="jumbotron jumbotron-fluid" style="background-image: url(home.parts/image/test.jpg);">
				<h3> Successfully Signed up </h3>
				
			</div>
		';
	}

	

	$conn->close();







?>
<?php include "../footer.php" ?>