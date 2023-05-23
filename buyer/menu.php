	<?php 
	 if(isset($_POST['btnlogout']))
	{
		$_SESSION['regid']=="";
		$_SESSION['username']=="";
		header('location:../main/login/login.php');
	}
	?>
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="home.php">Royal<span>estate</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="propertyshow.php" class="nav-link">Property</a></li>
		  <li class="nav-item"><a href="bookingshow.php" class="nav-link">Booking</a></li>
		  <li class="nav-item"><a href="imagegallery.php" class="nav-link">Gallery</a></li>
		   <div class="dropdown" style="padding : 0px">
            <li class="nav-item"><a class="nav-link btn  dropdown-toggle dropdown"type="button" style="font-size : 13px ; padding: 24px 20px !important">Profile</a></li>
            <ul class="dropdown-menu" style="background-color : #252A2B">
              <li><a class="nav-link" href="profileshow.php" style="font-color : white">My Profile</a></li>
              <li><a class="nav-link" href="profileupdate.php">Edit Your Profile</a></li>
			   <li><a class="nav-link" href="changepassword.php">Change Password</a></li>
            </ul>
          </div>
		  <div class="dropdown" style="padding : 0px">
            <li class="nav-item"><a class="nav-link btn  dropdown-toggle dropdown"type="button" style="font-size : 13px ; padding: 24px 20px !important">More</a></li>
            <ul class="dropdown-menu" style="background-color : #252A2B">
              <li><a class="nav-link" href="reviewform.php" style="font-color : white">Review</a></li>
              <li><a class="nav-link" href="feedbackform.php">Feedback</a></li>
			  <li><a class="nav-link" href="inquiryform.php">Inquiry</a></li>
			  <li><a class="nav-link" href="contact.php">Contact</a></li>
			   <li><a class="nav-link" href="emailshow.php">Email</a></li>
			  <li><a class="nav-link" href="messageshow.php">Message</a></li>
			   <li><a class="nav-link" href="paymentsuccess.php">Payments</a></li>
            </ul>
          </div>
		  <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
		  <li class="nav-item cta cta-colored" ><a href="../main/home.php" class="nav-link" style="background-color: #fb3636 !important"><span class="icon-user-circle-o"></span> Log-out</a></li>
        </ul>
      </div>
    </div>
  </nav>