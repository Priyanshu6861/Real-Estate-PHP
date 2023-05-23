<html>
  <head>
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
		  $filename=$rw['filename'];
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
		
		
		$query="select userid from profile where userid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
		  $query="update profile set username='$username',address='$address',cityid='$cityid',gender='$gender',contactno='$contactno',image='$filename',aboutus='$aboutus' where userid='$userid'";
		}
		else
		{
		  $query="insert into profile(userid,username,address,cityid,contactno,gender,image,aboutus) values('$userid','$username','$address','$cityid','$gender','$contactno','$filename','$aboutus')";
		}
		$result=$dc->saveRecord($query);
		if($result)
		{
		  $msg="Update Profile Successfully...";
		}
		else
		{
		  $msg="Profile not updated...";
		}
	  }
	?>
  </head>
  <body>
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
	<div id="wrapper" class="home-page">
	  <?php include('header.php');  ?>
	  <?php include('menu.php');  ?>
	
 <div class="row">
   <div class="col-md-4"></div>
   <div class="col-md-4">
	 
	 <div class="form-group">
		<h2>UPDATE USER PROFILE</h2> 
	</div>

	<div class="form-group">
	<label>User Name</label>
	<input type="text" name="txtusername" id="name" class="form-control" placeholder="Enter Name">
	</div>
	
	<div class="form-group">
	<label>Address</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4"> </textarea> 
	</div>					
	
	 <div class="form-group">
		  <label>City Name</label> 
		  <select name="lstcity" class="form-control"> 
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
	  <label>Contact Number</label>
	  <input type="text" name="txtcontactno" class="form-control" placeholder="Enter Contact Number">
	</div>
	
	<div class="form-group">
	  <label>Gender</label>
	  <input type="radio" name="rdogender" value="male"> Male
	  <input type="radio" name="rdogender" value="female"> Female
	</div>
	<div class="form-group">
	  <label>Image</label> 
	  <input id="fname" name="fupimage" type="file" class="form-control">
	</div>
	
	<div class="form-group">
	<label>About Us</label>
	<textarea name="txtaboutus" class="form-control" placeholder="Enter About Us" rows="4"> </textarea> 
	</div>					
	
    <div class="form-group">
   	  <input type="submit" name="btnupdate" value="Update" class="btn btn-success" />
	  <input type="submit" name="btncancel" value="Cancel" class="btn btn-danger" />
	</div>
	
	<div class="form-group">
	 <label class="lbl" <?php echo($msg); ?> </label>
	</div>
  </div>
   </div>	
    <?php include('footer.php');  ?>
  
</div>	
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>