<html>
<title>Profile Form</title>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/DataClass.php');
	?>
	<script src="../validation.js"></script>
	<?php
	  $buyerid="";
	  $regid="";
	  $buyername="";
	  $address="";
	  $cityid="";
	  $contactno="";
	  $emailid="";
	  $birthday="";
	  $filename="";
	  $tmpname="";
	  $aboutus="";
      $msg="";
	  $query="";
	  $dc=new DataClass();
	?>
	
	<?php
   	  if(isset($_SESSION['regid']) && $_SESSION['regid']!="")
	  {
		$regid=$_SESSION['regid'];  
	    $query="select buyerid from buyer where buyerid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="select * from buyer where buyerid='$regid'";
		  $rw=$dc->getRecord($query);
		  $buyername=$rw['buyername'];
		  $address=$rw['address'];
		  $contactno=$rw['contactno'];
		  $emailid=$rw['emailid'];
		  $birthday=$rw['birthday'];
		  $filename=$rw['image'];
		  $aboutus=$rw['aboutus'];
		}
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$regid=$_SESSION['regid'];
		
		$buyerid=$regid;  
		$buyername=$_POST['txtbuyername'];  
		$address=$_POST['txtaddress'];  
		$cityid=$_POST['lstcity'];
        $contactno=$_POST['txtcontactno']; 
		$emailid=$_POST['txtemailid']; 
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$aboutus=$_POST['txtaboutus'];   		
		
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$buyerid.".".$ext;	
		 }
		
	    $query="select buyerid from buyer where buyerid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="update buyer set buyername='$buyername',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',image='$filename',aboutus='$aboutus' where buyerid='$buyerid'";
		}
		else
		{
		  $query="insert into buyer(buyerid,buyername,address,cityid,contactno,emailid,image,aboutus) values('$buyerid','$buyername','$address','$cityid','$contactno','$emailid','$filename','$aboutus')";
		}
		
		$result=$dc->saveRecord($query);
		if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"userimages/".$filename);
		  }
		   $_SESSION['buyername']=$buyername;
		  header('location:profileshow.php');
	  }
		else
		{
		  $msg="Profile not updated...";
		}
	  }
	   if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:advertisementshow.php');
	 }	 
	  
	?>
<script>
		function checksubmit()
		{
			if(usnm.innerHTML!="" || adrs.innerHTML!="" || conno.innerHTML!="" || email.innerHTML!="")
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
    <div class="col-md-3"></div>
   <div class=" bg-white p-5 contact-form" >
	<div class="form-group">
	<label>User Name</label>
	<input type="text" name="txtbuyername" id="name" class="form-control" placeholder="Enter Name"  value="<?php echo($buyername) ?>" onchange="onlyalpha(this,usnm)" required>
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
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4" onchange="checklength(this,adrs,5,50)" required><?php echo($address) ?></textarea> 
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
	  <input id="fname" name="fupimage" type="file" class="form-control" onchange="checkAndFilterFiles()" required required>
		<label id="imagePreview"></label>
	</div>
	
	<div class="form-group">
	<label>About Us</label>
	<textarea name="txtaboutus" class="form-control" placeholder="Enter About Us" rows="4" onchange="checklength(this,dsc,5,100)"><?php echo($aboutus) ?> </textarea> 
	 <span id="dsc"></span>
	</div>					
	<div class="form-group">
	 <label class="lbl" <?php echo($msg); ?> </label>
	</div>
	
	<div class="form-group">
		<input type="submit" name="btnupdate" value="Update" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
		<input id="cancel" name="btncancel" type="submit" formnovalidate name="cancel" class="btn btn-danger py-3 px-5" value="Cancel">
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