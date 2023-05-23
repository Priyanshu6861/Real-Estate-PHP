<html>
<title>Remove Property</title>
<head>	
	<?php 
     session_start(); 
     include("csslink.php");
     include("../class/DataClass.php");
   ?> 
   
    <?php
     $msg="";
     $dc=new DataClass();
   ?>
   
   <?php
   if(isset($_POST['btndelete']))
	 {
	   $propid=$_POST['btndelete'];
	   $query="delete from property where propid='$propid'";
	   $result=$dc->saveRecord($query);
	   if($result)
	   {
	    $msg="Your Selling Property Has Been Removed...";
	   }
	   else
	   {
	     $msg="Record not Deleted...";
	   }
	 }
	
	 if(isset($_POST['btnlogout']))
	{
		$_SESSION['regid']=="";
		$_SESSION['username']=="";
		header('location:../main/login/login.php');
	}
	if(isset($_POST['btncancel']))
	{
	   header('location:home.php');
	}	
   ?>
  
</head>
<body>
	<form name="frmhome" action="#" method="post">	
	<div id="wrapper" class="home-page">
	 
    <?php include('header.php') ?>
	<?php include('menu.php') ?>
      
	   <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container" name="book">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Property</span></p>
            <h1 class="mb-3 bread">Property</h1>
          </div>
        </div>
      </div>
    </div>
	
	
	
      <section class="ftco-section bg-light" style="padding:1em!important">
	   <section class="ftco-section contact-section bg-light"style="padding:3em!important">
	 
         <div class="row">
    
   <table class="table table-hover" style="text-align:center">
    <thead class="active">
      <tr>
        <th>Property Name</th>
        <th>Address</th>
		<th>City</th>
        <th>Property Type</th>
		<th>Modle</th>
		<th>Unit</th>
		<th>Facilities</th>
		<th>Contractor</th>
		<th>Builder</th>
		<th>Architecturer</th>
		<th>Delete</th>
      </tr>
    </thead>

    <tbody>
      <?php 
		$regid=$_SESSION['regid'];
		$query="select p.propid,propname,p.address,cityname,googlemap,proptypename,price,unitname,facilities,contractor,builder,architecturer from property p,city c,unit u,proptype pt where c.cityid=p.cityid and u.unitid=p.unitid and p.proptypeid=pt.proptypeid and sellerid='$regid'"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<th>".$rw['propname']."</th>");
			echo("<td>".$rw['address']."</td>");
			echo("<td>".$rw['cityname']."</td>");
			echo("<td>".$rw['proptypename']."</td>");
			echo("<th>".$rw['price']."</th>");
			echo("<td>".$rw['unitname']."</td>");
			echo("<td>".$rw['facilities']."</td>");
			echo("<td>".$rw['contractor']."</td>");
			echo("<td>".$rw['builder']."</td>");
			echo("<td>".$rw['architecturer']."</td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['propid']."'>Remove</button></td>");
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");
			echo("<td></td>");
			echo("<td></td>");			
			echo("<td></td>");			
			echo("<td></td>");			
			echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");
            echo("<td></td>");
            echo("<td></td>");			
			echo("<td></td>");
			echo("</tr>");
		 ?>
    </tbody>
	
  </table>
  <span style="color:Black;font-size:20px;padding:10px 10px 0px 10px"> <?php echo($msg) ?></span>
  <div class="form-group">
	<input type="submit" name="btncancel" value="Back" formnovalidate name="cancel" class="btn btn-primary py-3 px-5">
  </div>
  </div>
  </section>
</section>
</div>
</form>  
        <?php include('footer.php') ?>
        <?php include('jslink.php') ?>
</body>

</html>
