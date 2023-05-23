<html>
<title>My Profile</title>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
<link rel="stylesheet" href="css/profile.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   <?php
    session_start();	
	include('../class/DataClass.php');
	?>
	<?php
      $msg="";
	  $query="";
	  $dc=new DataClass();
	?>
	
</head>
<body style="background: linear-gradient(to bottom, #33ccff 0%, #ff0000 100%);">
 <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
    <div id="wrapper" class="home-page">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-9 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile"  style=" background: linear-gradient(to bottom, #ff0000 0%, #33ccff 100%);">
                            <div class="card-block text-center text-white">
							 <?php
	    $regid=$_SESSION['regid'];  
	    $query="select * from seller where sellerid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="select * from seller p,city c where p.cityid=c.cityid and sellerid='$regid' ";
		  $rw=$dc->getRecord($query);
                           echo("<div class='m-b-25'><img src='userimages/".$rw['image']."' style='width : 50%' class='img-radius' alt='User-Profile-Image'> </div>");                           
                              echo("<h6 class='f-w-600 fa fa-user' style='font-size:20px'> ".$rw['sellername']."</h6>"); 
                           
                             echo("</div>");
                         echo("</div>");
                         echo("<div class='col-sm-8'>");
                             echo("<div class='card-block'>");
                                 echo("<h6 class='m-b-20 p-b-5 b-b-default f-w-600'>Information</h6>");
                                 echo("<div class='row'>");
                                     echo("<div class='col-sm-6'>");
                                         echo("<p class='m-b-10 f-w-600' >City Name</p>");
                                         echo("<h6 class='text-muted f-w-400'>".$rw['cityname']."</h6>");
                                     echo("</div>");
                                     echo("<div class='col-sm-6'>");
                                         echo("<p class='m-b-10 f-w-600'>Contact No</p>");
                                         echo("<h6 class='text-muted f-w-400'>".$rw['contactno']."</h6>");
                                     echo("</div>");
									    echo("<div class='col-sm-6'>");
                                         echo("<p class='m-b-10 f-w-600'>Email ID</p>");
                                         echo("<h6 class='text-muted f-w-400'>".$rw['emailid']."</h6>");
                                     echo("</div>");
									echo("<div class='col-sm-6'>");
                                         echo("<p class='m-b-10 f-w-600'>Address</p>");
                                         echo("<h6 class='text-muted f-w-400'>".$rw['address']."</h6>");
                                     echo("</div>");
								echo("</div>");
                                 echo("<div class='row'>");
                                     
                                     echo("<div class='col-sm-6'>");
                                         echo("<p class='m-b-10 f-w-600'>About Us</p>");
                                         echo("<h6 class='text-muted f-w-400'>".$rw['aboutus']."</h6>");
                                     echo("</div>");
									  echo("<div class='col-sm-6'>");
                                         echo("<p class='m-b-10 f-w-600'>Project Type</p>");
                                         echo("<h6 class='text-muted f-w-400'>".$rw['projecttype']."</h6>");
                                     echo("</div>");
									  echo("<div class='col-sm-6'>");
                                         echo("<p class='m-b-10 f-w-600'>Project List</p>");
                                         echo("<h6 class='text-muted f-w-400'>".$rw['projectlist']."</h6>");
                                     echo("</div>");
									 $imgname =$rw['image'];
									}
						?>		
						
							<ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="https://www.facebook.com/" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="https://twitter.com/" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="https://instagram.com/" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                              <div class="col-sm-6">
								<p class='m-b-10 f-w-600' >Edit Your Profile</p>
		                         <li><a href="profileupdate.php"><i class="fas fa-user-edit" style='font-size:35px'> </i></a></li>
								</div>
								
								<div class="col-sm-6">
								 <p class='m-b-10 f-w-600' >Back To Home</p>
		                         <li><a href="home.php"><i class="fas fa-home" style='font-size:35px'> </i></a></li>
								</div>
								
								
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
