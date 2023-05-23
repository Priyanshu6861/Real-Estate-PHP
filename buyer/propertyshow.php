<!DOCTYPE html>
<html lang="en">
<title>View Property</title>
  <head>
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
	  if(isset($_POST['btndetail']))
	  {
		 $propid=$_POST['btndetail'];  
		 $_SESSION['propid']=$propid;
		 header('location:propertydetails.php');
	  }
	   if(isset($_POST['btnsearch']))
	  {
		header('location:propertysearchshow.php');
	  }
	?>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
* {
  box-sizing: border-box;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  
}
</style>
	
  </head>
  <body>
        <?php include('header.php') ?>
        <?php include('menu.php') ?>
		
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Property</span></p>
            <h1 class="mb-3 bread">Property</h1>
          </div>
        </div>
      </div>
    </div>
    
	
	 <form action="#" class="bg-white contact-form" method="POST">
    <section class="ftco-section bg-light">
		<button type="submit" class="btn btn-primary py-3 px-5" name="btnsearch" value="Search" style="margin:0px 0px 43px 119px"><span class=" icon-search"> Search</button>
    	<div class="container">
    		<div class="row">
				 <?php
				 
		    $query="select propid,propname,price,cityname,filename from property p,city c where p.cityid=c.cityid";
			$tb=$dc->getTable($query);
			
			
			while($rw=mysqli_fetch_array($tb))
			{
			  echo("<div class='col-md-3'>"); 	
			  echo("<table class='table table-hover'>");
			  
			    echo("<tr><td><a href='../builder/propimage/".$rw['filename']."' target='_blank'><img src=../builder/propimage/".$rw['filename']." width='100%' height='100%' class=img-responsive' alt='Responsive image'
             width='307' height='240'></td></tr>");
	            echo("<tr><th>Property Name : ".$rw['propname']."</th></tr>");
				echo("<tr><td>City : ".$rw['cityname']."</td></tr>");
				echo("<tr><th>Price : ".$rw['price']."</th></tr>");
                echo("<tr><td><button type='submit' class='btn btn-primary' name='btndetail' value='".$rw['propid']."'><span class='icon-plus'> Details</button></td></tr>");					
			  echo("</table>");
			  echo("</div>");
			}
		  ?>
	   </div>
      </div>
    </section>   

  
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

   <?php include('jslink.php') ?>
    <?php include('footer.php') ?>
  	 </form>
  </body>
</html>