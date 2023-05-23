<html>
<title>Profile Form</title>
  <head>
  
			<script src="../validation.js"></script>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/DataClass.php');
	?>
	
	<?php
	  $userid="";
	  $regid="";
	  $username="";
	  $address="";
	  $cityid="";
	  $contactno="";
	  $gender="";
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
	    $query="select userid from profile where userid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="select * from profile where userid='$regid'";
		  $rw=$dc->getRecord($query);
		  $username=$rw['username'];
		  $address=$rw['address'];
		  $contactno=$rw['contactno'];
		  $gender=$rw['gender'];
		  $contactno=$rw['contactno'];
		  $filename=$rw['image'];
		  $aboutus=$rw['aboutus'];
		}
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$regid=$_SESSION['regid'];
		
		$userid=$regid;  
		$username=$_POST['txtusername'];  
		$address=$_POST['txtaddress'];  
		$cityid=$_POST['lstcity'];
		$gender=$_POST['rdogender'];
        $contactno=$_POST['txtcontactno'];   		
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$aboutus=$_POST['txtaboutus'];   		
		
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$userid.".".$ext;	
		 }
		
	    $query="select userid from profile where userid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="update profile set username='$username',address='$address',cityid='$cityid',gender='$gender',contactno='$contactno',image='$filename',aboutus='$aboutus' where userid='$userid'";
		}
		else
		{
		  $query="insert into profile(userid,username,address,cityid,gender,contactno,image,aboutus) values('$userid','$username','$address','$cityid','$gender','$contactno','$filename','$aboutus')";
		}
		$result=$dc->saveRecord($query);
		if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"userimages/".$filename);
		  }
		  $_SESSION['trans']="";
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
		  header('location:home.php');
	 } 
	?>
  </head>
  <body>
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
	<div id="wrapper" class="home-page">
	
	  <?php include('header.php');  ?>
	  <?php include('sidebar.php');  ?>
	  
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Edit Your Profile
    </div>
    <div class="row w3-res-tb">
		   <div id="page-inner" style="background-color: #fa9fa4">
		   <div class="col-md-5"></div>
			  <div class="col-md-7">
			 </div>
			 </div> 
			 <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		 <div class="form-group">
	<label>User Name</label>
	<input type="text" name="txtusername" id="name" class="form-control" placeholder="Enter Name"  value="<?php echo($username) ?>" onchange="onlyalpha(this,uname)" required >
	<label id="uname"></label>
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
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4" ><?php echo($address) ?>
	</textarea> 
	</div>					
	
	<div class="form-check">
	  <label>Gender : </label>
	  <input type="radio" name="rdogender" value="male" checked> Male
	  <input type="radio" name="rdogender" value="female"> Female
	</div>
	
	   <div class="form-group">
	  <label>Contact Number</label>
	  <input type="text" name="txtcontactno" class="form-control" placeholder="Enter Contact Number" value="<?php echo($contactno) ?>" onchange="checkmobileno(this,cn)" required>
	  <label id="cn"></label>
	</div>
	
	<div class="form-group">
	  <label>Image</label> 
	  <input id="fname" name="fupimage" type="file" class="form-control">
	</div>
	
	<div class="form-group">
	<label>About Us</label>
	<textarea name="txtaboutus" class="form-control" placeholder="Enter About Us" rows="4"><?php echo($aboutus) ?></textarea> 
	</div>					
	<div class="form-group">
		<input type="submit" name="btnupdate" value="Update" class="btn btn-primary py-3 px-5">
		<input type="submit" name="btncancel" value="Cancel" formnovalidate name="cancel" class="btn btn-danger py-3 px-5" />
	</div>
	<div class="form-group">
	 <label class="lbl" <?php echo($msg); ?> </label>
	</div>
	</div> 
</div>
</div>			


</div>
 </div>
 
 </section>
    </section>
	</div>
	</form>

   	<?php include('jslink.php') ?>
</body>

</html>