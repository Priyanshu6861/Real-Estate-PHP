<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/DataClass.php');
	?>
	<script src="../validation.js"></script>
	<?php
	  $sellerid="";
	  $regid="";
	  $sellername="";
	  $address="";
	  $cityid="";
	  $contactno="";
	  $emailid="";
	  
	  $filename="";
	  $tmpname="";
	  $aboutus="";
	  $projecttype="";
	  $projectlist="";
      $msg="";
	  $query="";
	  $dc=new DataClass();
	?>
	
	<?php
   	  if(isset($_SESSION['regid']) && $_SESSION['regid']!="")
	  {
		$regid=$_SESSION['regid'];  
	    $query="select sellerid from seller where sellerid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="select * from seller where sellerid='$regid'";
		  $rw=$dc->getRecord($query);
		  $sellername=$rw['sellername'];
		  $address=$rw['address'];
		  $contactno=$rw['contactno'];
		  $emailid=$rw['emailid'];
		  $filename=$rw['image'];
		  $aboutus=$rw['aboutus'];
		  $projecttype=$rw['projecttype'];
		  $projectlist=$rw['projectlist'];
		}
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$regid=$_SESSION['regid'];
		
		$sellerid=$regid;  
		$sellername=$_POST['txtsellername'];  
		$address=$_POST['txtaddress'];  
		$cityid=$_POST['lstcity'];
        $contactno=$_POST['txtcontactno']; 
		$emailid=$_POST['txtemailid']; 
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$aboutus=$_POST['txtaboutus'];   
		$projecttype=$_POST['txtprojecttype'];   
		$projectlist=$_POST['txtprojectlist'];   
		
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$sellerid.".".$ext;	
		 }
		
	    $query="select sellerid from seller where sellerid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="update seller set sellername='$sellername',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',image='$filename',aboutus='$aboutus',projecttype='$projecttype',projectlist='$projectlist' where sellerid='$sellerid'";
		}
		else
		  $query="insert into seller(sellerid,sellername,address,cityid,contactno,emailid,image,aboutus,projecttype,projectlist) values('$sellerid','$sellername','$address','$cityid','$contactno','$emailid','$filename','$aboutus','projecttype','projectlist')";
		{
		}
		
		$result=$dc->saveRecord($query);
		if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"userimages/".$filename);
		  }
		  
		  $_SESSION['sellername']=$sellername;
		  header('location:profileshow.php');
	  }
		else
		{
		  $msg="Profile not updated...";
		}
	  }
	  
	?>
	<script>
		function checksubmit()
		{
			if(usnm.innerHTML!="" || adrs.innerHTML!="" || conno.innerHTML!="" || email.innerHTML!="" || prjt.innerHTML!="" || prjl.innerHTML!="")
			{
				alert("Form is not valid");
				return false;
			}
			else
			{
				return true;
			}
		}
	</script>
  </head>
  <body>
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
	<div id="wrapper" class="home-page">
	
	  <?php include('header.php');  ?>
	  <?php include('menu.php');  ?>
	
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Profile</span></p>
            <h1 class="mb-3 bread">Edit Your Profile</h1>
          </div>
        </div>
      </div>
    </div>
	
 <div class="row">
    <div class="col-md-2"></div>
   <div class=" bg-white p-5 contact-form" >
	<div class="form-group">
	<label>User Name</label>
	<input type="text" name="txtsellername" id="name" class="form-control" placeholder="Enter Name"  value="<?php echo($sellername) ?>" onchange="onlyalpha(this,usnm)" required>
	<span id="usnm"></span>
	</div>
	
	 <div class="form-group">
		  <label>City Name</label> 
		  <select name="lstcity" class="form-control"  value="<?php echo($cityid) ?>"> 
		    <?php
			  $query="select cityid,cityname from city";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($stateid==$rw['cityid'])
            	  echo("<option value=".$rw["cityid"] ." selected>".$rw["cityname"]."</option>");
				else   
		         echo("<option value=".$rw["cityid"] .">".$rw["cityname"]."</option>");
			  }
			?>
		   </select>
	 </div>
	
	<div class="form-group">
	<label>Address</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4" onchange="checklength(this,adrs,5,150)" required><?php echo($address) ?></textarea> 
	<span id="adrs"></span>
	</div>
 <div class="form-group">
	  <label>Contact Number</label>
	  <input type="text" name="txtcontactno" class="form-control" placeholder="Enter Contact Number" value="<?php echo($contactno) ?>" onchange="checkmobileno(this,conno)" required>
	  <span id="conno"></span>
	</div>
	  </div>
	   <div class=" bg-white p-5 contact-form" >
	  
	
	<div class="form-group">
	<label>Email Id</label>
	<input type="text" name="txtemailid" id="name" class="form-control" placeholder="Enter Name"  value="<?php echo($emailid) ?>" onchange="checkemail(this,email)" required>
	<span id="email"></span>
	</div>	
	<div class="form-group">
	  <label>Image</label> 
	  <input id="fname" name="fupimage" type="file" class="form-control" onchange="checkAndFilterFiles()" required>
	  <label id="imagePreview"></label>
	</div>
	
	<div class="form-group">
	<label>About Us</label>
	<textarea name="txtaboutus" class="form-control" placeholder="Enter About Us" rows="4" onchange="checklength(this,dsc,5,100)"><?php echo($aboutus) ?> </textarea> 
	<span id="dsc"></span>
	</div>
<div class="form-group">
	  <label>Project Type</label>
	  <input type="text" name="txtprojecttype" class="form-control" placeholder="Enter Project Type" value="<?php echo($projecttype) ?>" onchange="onlyalpha(this,prjt)" >
	 <span id="prjt"></span>
	</div>
<div class="form-group">
	  <label>Project List</label>
	  <input type="text" name="txtprojectlist" class="form-control" placeholder="Enter Projectlist" value="<?php echo($projectlist) ?>" onchange="onlyalpha(this,prjl)" >
	  <span id="prjl"></span>
	</div>	
	<div class="form-group">
	 <label class="lbl" <?php echo($msg); ?> </label>
	</div>
	
	<div class="form-group">
		<input type="submit" name="btnupdate" value="Update" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
		<input type="submit" name="btncancel" value="Cancel" formnovalidate name="cancel" class="btn btn-danger py-3 px-5" />
	</div>
	
  </div>
  </div>
  </div>	
    <?php include('footer.php');  ?>
  
</div>	
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>