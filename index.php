

<?php 
 session_start();
//$_SESSION['name']='Saif';
include 'logoNtitle.php' ;

//echo isset($_SESSION);
//echo $_SESSION['name'];
?>

<?php if($_SESSION['user']=="0"){ echo 
 /*'<div class="row" style>
          <div class="col" style="float: right;">
          <button class="btn"><a href="index.php">Home</a></button>
          <button class="btn"><a href="about.php">About</a></button>
          </div>

          <div class="col-sm-3" style="align-self: right;">
           
          
          </div>
      </div>
      ';*/

      include "home.parts/unlogged_button.php";

      include "home.parts/signup_menu.php";

  }
  else
  {

  	//This simply add the buttons
  	echo '
<div class="row" style>
          
          	<div class="col-1"><button class="btn"><a href="index.php">Home</a></button></div>
          	
          	<div class="col-1"> <button class="btn"><a href="about.php">About</a></button></div>

          	<div class="col-8"></div>
          	<div class="col">
            <form class="form-inline" action="login.action/logout.php" method="post">
			    
			  <button type="submit" class="btn btn-default">Logout</button>
			</form>
		</div>

         
</div>';

	
	if($_SESSION['usertype']=='cafe')
	{

		echo '<div class="jumbotron jumbotron-fluid" style="background-image: url(home.parts/image/test.jpg);">
				<div class="row">
					<div class=col-5> </div>
					<div class=col-1> 
						<button type="submit" class="btn btn-lg"><a href="feature/addfood.php">Add Food</a></button>
					</div>
				</div>
				
			</div>
		';
	}


	else if($_SESSION['usertype']=='user')
	{
		//echo "Just an user";
		include 'feature/showitems.php';
			
	}


  	//echo $_SESSION['user'];
  	//echo isset($_SESSION['user']);
  }
?>

<?php include 'footer.php' ?>