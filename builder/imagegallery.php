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
	
	 <div class="row">
	 
	     <?php
	    
		$tb=$dc->getTable("select * from gallery");
		 while($rw=mysqli_fetch_array($tb))
		 {
			echo( "<div class='col-md-3'>"); 
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
		  
	  
	
     <?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>