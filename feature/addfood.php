<?php 
	
	include '../logoNtitle.php' ;
?>

	<div class="col-1"><button class="btn"><a href="../index.php">Home</a></button></div>

	<h2>FILLUP THE ADD FOOD FORM</h2>
	<form action="/addfoodaction.php" method="post">
	 
	 Food ID: <input type="text" class="form-control" name='f_id'>
	 Food Name : <input type="text" class="form-control" name='foodname'>
	 Item Left: <input type="text" class="form-control" name='itemleft'>
	 Price : <input type="text" class="form-control" name='price'>
	 Discount : <input type="text" class="form-control" name='discount'>
	 Time Upped:<input type="text" class="form-control" name='time'>
	 Donateable: <select name="donateable">
				  <option value="yes">yes</option>
				  <option value="no">no</option>
				</select>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

<?php
	include "../footer.php";
?>