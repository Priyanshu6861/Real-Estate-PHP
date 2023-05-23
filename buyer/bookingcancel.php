<!DOCTYPE html>
<html lang="en">
<title>Booking Cancel</title>
  <head>
    <title>Booking Calcel</title>
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
    $bookcanid="";
	$bookcandate="";
	$bookid="";
	$propid="";
	$reason="";
	$status="";
	$remarks="";
	$msg="";
	$dc=new dataclass();
	$bookid=$_SESSION['bookid'];
  ?>
  
  <?php         
	if(isset($_POST['btnsave']))
	{
		$query="select * from booking";
		$rw=$dc->getRecord($query);
		$propid1=$rw["propid"];
	  if($rw)
	  {	  
			$bookcandate=date('y-m-d');
			$bookid1=$bookid;
			$propid=$propid1;
			$reason=$_POST['txtreason'];
			$status="pending";
			$remarks=$_POST['txtremarks'];
		  
		 $query="insert into bookingcancel(bookcandate,bookid,propid,reason,status,remarks) values('$bookcandate','$bookid1','$propid','$reason','$status','$remarks')";
      	 $result=$dc->saveRecord($query);
	     if($result)
	     {
		   $msg="Your Request Has Been Sent :)";
		 }
		 else
		 {
		   $msg="Request Not Sent :(";
		 }
	  }
	 }
	 if(isset($_POST['btncancel']))
	{
	   header('location:bookingshow.php');
	}	
  ?> 
     <script>
		function checksubmit()
		{
			if(dsc.innerHTML!="")
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Calcel</span></p>
            <h1 class="mb-3 bread">Booking Cancelation</h1>
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
                <input type="text" name="txtreason" class="form-control" placeholder="Reason" onchange="checklength(this,dsc,5,100)" required>
				<span id="dsc"></span>
              </div>
              <div class="form-group">
                <input type="text" name="txtremarks" class="form-control" placeholder="Remarks">
              </div>
			  
              <div class="form-group">
                <input type="submit" name="btnsave" value="Send" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
				 <input type="submit" name="btncancel" value="Cancel" formnovalidate name="cancel" class="btn btn-danger py-3 px-5">
              </div>
			  
			 <div class="form-group">
                <label name="lblmsg"> <?php echo($msg) ?></label>
				 <?php
			    $bookid=$_SESSION['bookid'];
				
				$query="select * from bookingcancel where bookcanid='$bookcanid'";
				$tb=$dc->getTable($query);
				while($rw=mysqli_fetch_array($tb))
				{
				   echo("<table class='table table-bordered'>");			  
			       echo("<tr><td width='100px'>Reason</td>");
				   echo("<td>".$rw["reason"]."</td></tr>");
				   echo("<tr><td width='100px'>Reply</td>");
				   echo("<td>".$rw["status"]."</td></tr>");
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