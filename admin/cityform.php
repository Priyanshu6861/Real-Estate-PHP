<html>
<title>City Form</title>
<head>
	<?php
		session_start();
		include('csslink.php');
		include("../class/DataClass.php");
	?>

     <?php
     $cityid="";
	 $cityname="";
	 $shortname="";
	 $pincode="";
	 $stateid="";
	 $dc=new DataClass();
	 $msg1="";
	 $msg2="";
   ?>
     <?php
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 
	 if($_SESSION['trans']=="update")
	 {
	   $cityid=$_SESSION['cityid'];
	   $query="select * from city where cityid='$cityid'";
	   $rw=$dc->getRecord($query);
	   $cityname=$rw['cityname'];
	   $shortname=$rw['shortname'];
	   $pincode=$rw['pincode'];
	   $stateid=$rw['stateid'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $cityname=$_POST['txtcityname'];
	    $shortname=$_POST['txtshortname'];
	    $pincode=$_POST['txtpincode'];
		$stateid=$_POST['lststate'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	    $query="insert into city(cityname,shortname,pincode,stateid) values('$cityname','$shortname','$pincode','$stateid')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $cityid=$_SESSION['cityid'];  
	   $query="update city set cityname='$cityname',shortname='$shortname',pincode='$pincode',stateid='$stateid' where cityid='$cityid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:cityshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:cityshow.php');
	 } 
   ?>
   <script src="../validation.js"></script>
    <script>
		function checksubmit()
		{
			if(sname.innerHTML!="" || sn.innerHTML!="" || pin.innerHTML!="")
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
   <style type="text/css">
     .form-control
	 {
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
   
   </style> 
</head>
<body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper">
        <?php include('header.php') ?>
        <?php include('sidebar.php') ?>
		
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      City Form
    </div>
    <div class="row w3-res-tb">
		   <div id="page-inner" style="background-color: #fa9fa4">
		   <div class="col-md-5"></div>
			  <div class="col-md-7">
			   <p><?php echo($msg1) ?></p>
			 </div>
			 </div> 
			 <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>City Name</label> 
		  <input placeholder="Enter City Name" id="cityname" name="txtcityname" type="text" class="form-control" value='<?php echo($cityname) ?>' onchange="onlyalpha(this,sname)" required>
		  <span id="sname"></span>
		  <div class="form-group">
		  <label>Short Name</label> 
		  <input placeholder="Enter Short Name" id="shortname" name="txtshortname" type="text" class="form-control" value='<?php echo($shortname) ?>' onchange="checklength(this,sn,3,5)" required>
		   <span id="sn"></span>
		 </div>
		 <div class="form-group">
		  <label>Pincode</label> 
		  <input placeholder="Enter Pincode" id="pincode" name="txtpincode" type="text" class="form-control" value='<?php echo($pincode) ?>' onchange="checkpincode(this,pin)" required>
			<span id="pin"></span>
		 </div>
		 <div class="form-group">
		  <label>State Name</label> 
		  <select name="lststate" class="form-control"> 
			<?php 
			  $query="select stateid,statename from state";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
		        echo("<option value=".$rw["stateid"] .">".$rw["statename"]."</option>");
			  }
			?>
		  </select>
		 </div>
		 <div class="form-group">
		    <input id="save" name="btnsave" type="submit" class="btn btn-success" value="Save" onclick="return checksubmit()">
			<input id="cancel" name="btncancel" type="submit" formnovalidate name="cancel" class="btn btn-danger" value="Cancel">
		 </div>
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
