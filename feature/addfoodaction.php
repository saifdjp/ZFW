<?php 
	session_start();
include "../logoNtitle.php" ?>

<?php 

	$fid=$_POST['f_id'];
    $name = $_POST['foodname'];
    $itemleft=$_POST['itemleft'];
 	$user = $_SESSION['user'];
    $price= $_POST['price'];
    $discount= $_POST[ 'discount'];
    $tleft = $_POST['time'];
    $donateable = $_POST['donateable'];
   // echo $name;
    //echo $user;
    //Handeling Images
    $image = $_FILES['image']['tmp_name'];
    $imgContent = file_get_contents($image);
    
    $imgId;
    while(1)
    {
    	$imgId = mt_rand();
    	$filename= "../foodImg/". $imgId .".jpg";
    	//echo $filename . "<br>";
    	if(file_exists($filename) != 1)
    	{		
    		file_put_contents($filename, $imgContent);
    		break;
    	}
    }



    //echo "$tleft";
	$username  = "root";
	$pass ="";
	$serveraddr="localhost";
	$dbname="zfwdb";

		$conn = new mysqli($serveraddr, $username, $pass, $dbname);

		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}	
		
		//$stmt = "INSERT INTO `cafe` (`Cafe_id`, `Name`, `pass`) VALUES ('121', '121', '1212')";
		$stmt = "INSERT INTO `food` (`f_id`, `c_username`, `name`, `itemleft`, `price`, `discount`, `timeleft`,`donateable`,`picture`) VALUES ('$fid', '$user', '$name', '$itemleft', '$price', '$discount', '$tleft','$donateable','$imgId')";

		//echo $stmt;
		
		if ($conn->query($stmt) === TRUE) {
   			echo "New record created successfully";
		} else {
    		//echo "Error: " . $stmt . "<br>" . $conn->error;
    		echo "error!";
		}

		$conn->close();




 ?>


<?php include "../footer.php" ?>