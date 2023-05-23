<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inquiry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	<script src="../validation.js"></script>
	<?php
	session_start();
    include("../class/DataClass.php");
    ?>

 <?php
    $inqid="";
	$inqdate="";
	$buyerid="";
	$details="";
	$inqfor="";
	$status="";
	$msg="";
	$dc=new dataclass();
  ?>
  
  <?php         
	if(isset($_POST['btnsave']))
	{
	      $inqdate=date('y-m-d');
		  $buyerid=$_SESSION['regid'];
		  $details=$_POST['txtdetails'];
		  $inqfor=$_POST['txtinqfor'];
		  $status="pending";
		  		  
		 $query="insert into inquiry(inqdate,buyerid,details,inqfor,status) values('$inqdate','$buyerid','$details','$inqfor','$status')";
      	 $result=$dc->saveRecord($query);
	     if($result)
	     {
		   $msg="Inquiry Submit Successfully";
		 }
		 else
		 {
		   $msg="Inquiry Not Submited";
		 }
	 }
	 if(isset($_POST['btncancel']))
	{
	   header('location:home.php');
	}	
  ?> 
   <script>
		function checksubmit()
		{
			if(tlt.innerHTML!="" || dsc.innerHTML!="")
			{
				alert("Form is not valid");
				return false;
			}
			else
			{
				return true;
			}
		}
	</script>
  </head>
  <body>

	<?php include('header.php') ?>
	<?php include('menu.php') ?>

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>INQUIRY</span></p>
            <h1 class="mb-3 bread">INQUIRY</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row block-9">
		  <div class="col-md-3"></div>
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form" method="POST">
			  <div class="form-group">
                <input type="text" name="txtinqfor" class="form-control" placeholder="Inquiry For" onchange="onlyalpha(this,tlt)" required>
               <span id="tlt"></span>
			 </div>
              <div class="form-group">
                <input type="text" name="txtdetails" class="form-control" placeholder="Details" onchange="checklength(this,dsc,5,100)" required>
              <span id="dsc"></span>
			  </div>
			  
              <div class="form-group">
                <input type="submit" name="btnsave" value="Send" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
				 <input type="submit" name="btncancel" value="Cancel" formnovalidate name="cancel" class="btn btn-danger py-3 px-5">
              </div>
			  
			 <div class="form-group">
                <label name="lblmsg"> <?php echo($msg) ?></label>
				 <?php
			    $buyerid=$_SESSION['regid'];
				
				$query="select * from inquiry where buyerid='$buyerid'";
				$tb=$dc->getTable($query);
				while($rw=mysqli_fetch_array($tb))
				{
				   echo("<table class='table table-bordered'>");			  
			       echo("<tr><td width='100px'>Inquiry</td>");
				   echo("<td>".$rw["details"]."</td></tr>");
				   echo("<tr><td width='100px'>Reply</td>");
				   echo("<td>".$rw["response"]."</td></tr>");
				   echo("</table>"); 
				}
				?>
             </div>
			   
		  
		  </form>
		</div>
          </div>
		 </div>
    </section>
		
    <?php include('footer.php') ?>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>   
  </body>
</html>