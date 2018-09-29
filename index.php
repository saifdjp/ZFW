

<?php 
//session_start();
//$_SESSION['name']='Saif';
include 'logoNtitle.php' ;

//echo isset($_SESSION);
//echo $_SESSION['name'];
?>

<?php if(!isset($_SESSION)) echo 
'<div class="row" style>
          <div class="col" style="float: right;">
          <button class="btn"><a href="index.php">Home</a></button>
          <button class="btn"><a href="about.php">About</a></button>
          </div>

          <div class="col-sm-3" style="align-self: right;">
           
          
          </div>
      </div>
      ';

      include "home.parts/signup_menu.php";
?>

<?php include 'footer.php' ?>