<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact</title>
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
	 $contactdate="";
	 $personname="";
	 $details="";
	 $contactno="";
	 $emailid="";
	 $reply="";
	 $dc=new DataClass();
	 $msg="";
	?>
     <?php
	 if(isset($_POST['btnsave']))
	 {
		$contactdate=date('y-m-d');
	    $personname=$_POST['txtpersonname'];
	    $details=$_POST['txtdetails'];
	    $contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
		$reply="no";
	    $query="insert into contact(contactdate,personname,details,contactno,emailid,reply) values('$contactdate','$personname','$details','$contactno','$emailid','$reply')";
		
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		$msg="Contact Detail Sebbimited...";
	  }
	  else
	  {
	    $msg="Not Sended...";
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
			if(connm.innerHTML!="" || conno.innerHTML!="" || email.innerHTML!="")
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
            <h1 class="mb-3 bread">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span> <a>Postmaster, Navsari H.O, Navsari, Gujarat, India (IN), Pin Code:-396445</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a >+91 98257 56861 / 96649 53418</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a>RealEstate@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website:</span> <a>Real Estate.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form" method="POST">
				
              <div class="form-group">
                <input type="text" name="txtpersonname" class="form-control" placeholder="Your Name" onchange="onlyalpha(this,connm)" required >
				<span id="connm"></span>
			  </div>
			  <div class="form-group">
                <input type="text" name="txtcontactno" class="form-control" placeholder="Contact No" onchange="checkmobileno(this,conno)" required>
             <span id="conno"></span>
			 </div>
              <div class="form-group">
                <input type="text" name="txtemailid" class="form-control" placeholder="Your Email" onchange="checkemail(this,email)" required>
              <span id="email"></span>
			  </div>
			<div class="form-group">
                <textarea name="txtdetails" id="details" cols="30" rows="7" class="form-control" placeholder="Details" onchange="checklength(this,dsc,5,100)"></textarea>
               <span id="dsc"></span>
			  </div>
			  
              <div class="form-group">
                <input type="submit" name="btnsave" value="Send" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
				<input type="submit" name="btncancel" value="Cancel" formnovalidate name="cancel" class="btn btn-danger py-3 px-5">
              </div>
			   <div class="form-group">
		        <label name="lblmsg"> <?php echo($msg) ?> </label>
		       </div>
            </form>
          </div>
           <div class="col-md-6 d-flex">
           <image src="images/contact1.png" style="width:100%"></image>
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