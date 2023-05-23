<!DOCTYPE html>
<html lang="en">
<title>Property Search</title>
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
            <h1 class="mb-3 bread">Search Property</h1>
          </div>
        </div>
      </div>
    </div>
    
	
	 <form action="#" class="bg-white contact-form" method="POST">
    <section class="ftco-section bg-light">
    	<div class="container">
		 <table class="table table-hover"  style="text-align:center">
      <div class="row">
		 <input class="form-control" id="myInput" type="text" placeholder="Search Property By Name, City, Price...">
	  <thead>
      <tr>
        <th>Property Name</th>
		<th>City Name</th>
		<th>Amount</th>
		<th>More Details</th>
      </tr>
    </thead>
	<tbody id='myTable'>
    		 <?php
				 
		    $query="select propid,propname,price,cityname,filename from property p,city c where p.cityid=c.cityid";
			$tb=$dc->getTable($query);
			while($rw=mysqli_fetch_array($tb))
			{

			echo("<tr>");
			echo("<th>".$rw['propname']."</td>");
			echo("<th>".$rw['cityname']."</td>");
			echo("<th>".$rw['price']."</td>");
			echo("<th><button type='submit' class='btn btn-primary py-3 px-5' name='btndetail' value='".$rw['propid']."'><span class='icon-plus'> Details</button></td>");
		//	echo("<td><img src=../builder/propimage/".$rw['filename']." width='100%' height='100%'></td>");
								
		    }
			
			
		
		  ?>
		 </tbody>
		</table>
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