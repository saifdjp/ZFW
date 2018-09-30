<?php
	
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

	//SELECT Cafe_id,pass FROM `cafe` WHERE 1
	$sql = "SELECT * FROM food WHERE 1";


	//echo $sql;
	$result = $conn->query($sql);
	
	//$row = $result->fetch_assoc();


	//echo ($result->num_rows);
	
		$i=0;
		$start="";
		$end="";
		//echo "<div class='row'>";
		while($row = $result->fetch_assoc())
		{
			//echo $i%3;
			if($i%3==0) $start= "<div class='row' style='padding:5px'>";
			else $start="";

			$i++;

			if($i%3==0) $end= "</div>";
			else $end="";
			//echo $start . $end  ;

			$fid=$row['f_id'];
		    $name = $row['name'];
		    $itemleft=$row['itemleft'];
		 	$user = $row['c_username'];
		    $price= $row['price'];
		    $discount= $row[ 'discount'];
		    $tleft = $row['timeleft'];
		    $donateable = $row['donateable'];


			$imgID = $row['picture'];
			
			//echo "HEllo";
			$imgLoc= 'foodImg\\' . $imgID .".jpg" ;
			//echo $imgLoc;
			
			//To show the img
			//$img = '<img src=' . $imgLoc .' style="height:10%;width:10%;">';
			//echo $img;
			//echo $imgLoc;
			//echo '<img src="footImg/1465084200.jpg" >';

			$aCard= $start . '
			<div class="col-sm-4" >
			<div class="container">
			  <div class="card" style="width:100%">
			    <img class="card-img-top" src='.$imgLoc.' alt="Card image" style="width:100%; height:500px">
			    <div class="card-body">
			      <h4 class="card-title"> Name: '.$name.'</h4>
			      <p>Price :' . $price. '</p>
			      <p>Discounted Price : ' . (string) ($price- (($price*$discount)/100)) . '
			      <p></p>
			      <p> Item Left : ' .$itemleft .' </p>

			      <form class="form-inline" action="feature/orderitem.php" method="post">
			    		<input type="hidden" name="foodId" value="'.$fid.'">
			    		<input type="hidden" name="cafeId" value="'.$user.'">
			 		 <button type="submit" class="btn btn-primary">Order</button>
				</form>
			       
			    </div>
			 </div>
			</div>
			</div>
			 ' . $end ;

			echo $aCard;
			/*echo "

				<div class='col-sm'>
					
					$fid $cid
						$count 
						$name 
						$price 
						$dis
						$time 
						
				</div>
				

			";*/
			
		
		
		}
		echo "</div>";
		
	
	$conn->close();
?>