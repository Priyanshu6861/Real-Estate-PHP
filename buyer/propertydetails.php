<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Property Details</title>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/DataClass.php');
	?>
	
	<?php
      $msg="";
	  $query="";
	  $dc=new DataClass();
	?>
	
	<?php
	 if(isset($_POST['btnback']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:propertyshow.php');
	 } 
	  if(isset($_POST['btnbook']))
	 {
		$regid=$_SESSION['regid'];
		 $propid=$_POST['btnbook'];
	 	 $_SESSION['propid']=$propid; 
		 header('location:bookingform.php');
	 } 
   ?>
   <style>
   .table th, .table td {
    padding: 0.5rem;
    border-top: 0px solid #dee2e6;
   }
   </style>
  </head>
  <body>
   <?php include('header.php');  ?>
  <?php include('menu.php');  ?>

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Blog</a></span> <span>Property Single</span></p>
            <h1 class="mb-3 bread">Proerty Details</h1>
          </div>
        </div>
      </div>
    </div>

    <form action="#" class="bg-white p-5 contact-form" method="POST">
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">         		
				 <?php
				  $propid=$_SESSION['propid']; 
		    $query="select propid,propname,address,cityname,googlemap,proptypename,description,price,unitname,facilities,contractor,builder,architecturer,filename from property p,city c,proptype pt,unit u where p.propid='$propid' and p.cityid=c.cityid and p.proptypeid=pt.proptypeid and p.unitid=u.unitid";
			$rw=$dc->getRecord($query);
			
			 echo("<div class='col-md-5'>");
			 echo("<table class='table' height='400px'>");
			 echo("<tr><td colspan='15'><H3>PROPERTY DETAILS</H3></td></tr>");
			 echo("<tr><th >Property Name</th><th>".$rw['propname']."</th></tr>");
             echo("<tr><th>Address</th><td>".$rw['address']."</td></tr>");	
		     echo("<tr><th>City</th><td>".$rw['cityname']."</td></tr>");	
		     echo("<tr><th>Google Map</th><td>".$rw['googlemap']."</td></tr>");
			 echo("<tr><th>Property Type</th><td>".$rw['proptypename']."</td></tr>");
             echo("<tr><th>Description</th><td>".$rw['description']."</td></tr>");	
		     echo("<tr><th>Price</th><th>".$rw['price']."</th></tr>");
			 echo("<tr><th>Unit</th><td>".$rw['unitname']."</td></tr>");
             echo("<tr><th>Facilities</th><td>".$rw['facilities']."</td></tr>");	
		     echo("<tr><th>Contractor</th><td>".$rw['contractor']."</td></tr>");	
		     echo("<tr><th>Builder</th><td>".$rw['builder']."</td></tr>");
             echo("<tr><th>Architecturer</th><td>".$rw['architecturer']."</td></tr>");	
             echo("</table>");
			 echo("</div>");
			 echo("<div class='col-md-6'>");
			 echo("<img src=../builder/propimage/".$rw['filename']." width='120%'>");
			 echo("<table class='table' height='400px'>");
			 echo("<div class='col-md-8'></div>");
			 echo("<tr><td><button type='submit' class='btn btn-primary' name='btnbook' value='".$rw['propid']."' style='padding:10px 40px 10px 40px; margin:0px 10px 10px 10px'>Book Property</button>");	
			 echo("<button type='submit' class='btn btn-danger' name='btnback' value='Back' style='padding:10px 40px 10px 40px; margin:0px 10px 10px 10px'>Back</button></td></tr>");	
			 echo("</div>");
			 echo("</table>");

			?>
			</div>
	      <div class="col-md-12">
		   <H3 class="icon-image" style="padding:0px 40px 10px 6px"> MORE PROPERTY IMAGES</H3>
		  </div>
			<?php
			
		    $query="select * from propertyimage where propid='$propid'";
			$tb=$dc->getTable($query);
			while($rw=mysqli_fetch_array($tb))
			{	
		     echo("<div class='col-md-4'>");
			 echo("<table class='table'>");
		     echo("<tr><td><img src=../builder/propertyimage/".$rw['filename']." height='300px' width='370px'><td></tr>");	
			 echo("<tr><th>".$rw["imgname"]."</tr>"); 
	         echo("<tr><th>".$rw["description"]."</th></tr>");
		 	 echo("</table>");
	         echo("</div>");
			}
		  ?>
		  <div class="col-md-12">
		   <H3 class="icon-image" style="padding:0px 40px 10px 6px; margin:10px 10px"> AMINITIES</H3>
		  </div>
			<?php
			echo("</table>");
		    $query="select * from aminity where propid='$propid'";
			$tb=$dc->getTable($query);
			while($rw=mysqli_fetch_array($tb))
			{
				
				echo("<div class='col-md-4'>");
				 echo("<table class='table'>");
				 echo("<tr><td><img src=../builder/aminityimages/".$rw['filename']." height='300px' width='370px'><td></tr>");	
				  echo("<tr><th>".$rw["aminityname"]."</tr>"); 
				  echo("<tr><th>".$rw["description"]."</th></tr>");
				 echo("</table>");
			  echo("</div>");
			}
		  ?>	  
  </div>		  
</div>
    </section>
</form>
  <?php include('footer.php');  ?>
  
   <?php include('jslink.php');  ?>
  </body>
</html>