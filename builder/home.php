<html>
<title>Seller Home</title>
<head>
    <?php include('csslink.php') ?>
		<?php
	session_start();
    include("../class/DataClass.php");
	$dc=new DataClass();
	include('csslink.php');
	
	  if(isset($_POST['btndetail']))
	  {

		 header('location:../main/login/login.php');
	  }
	   if(isset($_POST['btnsearch']))
	  {
		header('location:../main/login/login.php');
	  }
	?>
</head>
<body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
        <?php include('header.php') ?>
        <?php include('menu.php') ?>
		<?php include('slider.php') ?>
        <?php include('contant1.php') ?>
		
		<div class="container">
		 <div class="form-group">
			<button type="submit" class="btn btn-primary py-3 px-5" name="btnsearch" value="Search" style="margin:20px 10px 10px 900px"><span class="icon-list-alt"> View More</button>
				</div>
    		<div class="row">
			
				<?php
				 $regid=$_SESSION['regid'];
		    $query="select propid,propname,price,cityname,filename,sellerid from property p,city c where p.cityid=c.cityid and sellerid='$regid' LIMIT 4";
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
		
		
        <?php include('footer.php') ?>
        <?php include('jslink.php') ?>
</div>
</form>
</body>

</html>
