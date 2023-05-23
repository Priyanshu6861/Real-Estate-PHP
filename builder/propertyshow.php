<html>
<title>View Property</title>
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
	 if(isset($_POST['btnnew']))
	  {
		$_SESSION['trans']="new";   
		header('location:propertyform.php');  
	  }
	   if(isset($_POST['btnremove']))
	  {   
		header('location:propdelete.php');  
	  }
	  if(isset($_POST['btnaminity']))
	  {
		$propid=$_POST['btnaminity'];  
		$_SESSION['propid']=$propid;
		$_SESSION['trans']="aminity";   
		header('location:aminityform.php');
	  }
	  
	  if(isset($_POST['btnpropimg']))
	  {
		$propid=$_POST['btnpropimg'];  
		$_SESSION['propid']=$propid;
		$_SESSION['trans']="propimg";   
		header('location:propertyimageform.php');
	  }
	 if(isset($_POST['btnlogout']))
	{
		$_SESSION['regid']=="";
		$_SESSION['username']=="";
		header('location:../main/login/login.php');
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
	   <section class="ftco-section contact-section bg-light"style="padding:1em!important">
	 
         <div class="row">
          <div class="col-md-2">
		   <button type='submit' class='btn btn-primary' name='btnnew' value='NEW' style="padding:10px 40px 10px 40px; margin:20px"> New</button>
	      </div>
		  <div class="col-md-7"></div>
			<div class="col-md-2">
			  <button type='submit' class='btn btn-danger' name='btnremove' value='remove' style="padding:10px 40px 10px 40px; margin:20px"> Remove Property</button>
			</div>
   <table class="table table-hover" style="text-align:center">
    <thead class="active">
      <tr>
        <th>Property Name</th>
        <th>Address</th>
		<th>City</th>
        <th>Property Type</th>
        <th>Price</th>
		<th>Unit</th>
		<th>Facilities</th>
		<th>Contractor</th>
		<th>Builder</th>
		<th>Architecturer</th>
		<th>Aminitys</th>
		<th>Prop.Img</th>
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
			echo("<td><button type='submit' class='btn btn-primary' name='btnaminity' value='".$rw['propid']."'>Aminity</button></td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btnpropimg' value='".$rw['propid']."'>PropImg</button></td>");
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
            echo("<td></td>");			
			echo("<td></td>");
			echo("</tr>");
		 ?>
    </tbody>
  </table>
  </div>
  </section>
</section>
</div>
</form>  
        <?php include('footer.php') ?>
        <?php include('jslink.php') ?>
</body>

</html>
