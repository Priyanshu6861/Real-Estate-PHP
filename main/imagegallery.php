<html>
<title>Gallery</title>
  <head>
    <?php 
	  include('csslink.php');  
	  include('../class/DataClass.php');  
	?>
	
	<?php 
	  $dc=new DataClass();
	?>
  </head>
  <body>
  
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
	  <?php include('header.php');  ?>
	  <?php include('menu.php');  ?>
	
	 <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Gallery</span></p>
            <h1 class="mb-3 bread">Gallery</h1>
          </div>
        </div>
      </div>
    </div>
	
	 <section class="ftco-section contact-section bg-light">
 <div class="col-md-12 mb-4">
            <h1 class="h3" style="margin-left: 105px">Top Property Images</h1>
          </div>
    <div class="container" >
	<div class="info bg-white p-4">
	 <div class="row">
	 
	     <?php
	    
		$tb=$dc->getTable("select * from gallery");
		 while($rw=mysqli_fetch_array($tb))
		 {
			echo( "<div class='col-md-4'>"); 
			echo("<table class='table'>");
			$imgid=$rw['imgid']; 
			echo("<tr><td><img src='../admin/gallery/".$rw['filename']."' width='100%' height='200px'></td></tr>");
			echo("<tr><td>".$rw['title']."</td></tr>");
			echo("</table>");			 
			echo("</div>");
	      }
	    ?>
		
		</div>
	  </div>
	</div>
		</div>
	</section>
	  
	
     <?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>