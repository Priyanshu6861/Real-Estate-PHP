<html>
<head>
<title>Email Form</title>
	<script src="../validation.js"></script>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>

     <?php
     $emailid="";
	 $emaildate="";
	 $emailfrom="";
	 $emailto="";
	 $subject="";
	 $description="";
	 $regid="";
	 $dc=new DataClass();
	 $msg1="";
	 $msg2="";
   ?>
     <?php
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $emaildate=date('y-m-d');
	    $emailfrom=$_POST['txtemailfrom'];
	    $emailto=$_POST['txtemailto'];
		$subject=$_POST['txtsubject'];
	    $description=$_POST['txtdescription'];
		$regid=$_POST['lstusername'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into email(emaildate,emailfrom,emailto,subject,description,regid) values('$emaildate','$emailfrom','$emailto','$subject','$description','$regid')";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:emailshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:emailshow.php');
	 } 
   ?>
   
  <script>
		function checksubmit()
		{
			if(emf.innerHTML!="" || emt.innerHTML!="" || sub.innerHTML!="")
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
	</div>
		
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
		<div class="panel panel-default">
			<div class="panel-heading">
			Email Form
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
		  <label>Email From</label> 
		  <input placeholder="Enter Emailfrom" id="emailfrom" name="txtemailfrom" type="text" class="form-control" value='<?php echo($emailfrom) ?>' onchange="checkemail(this,emf)" required>
		  <span id="emf"></span>
		 </div>
		  <div class="form-group">
		  <label>Email To</label> 
		  <input placeholder="Enter Emailto" id="emailto" name="txtemailto" type="text" class="form-control" value='<?php echo($emailto) ?>' onchange="checkemail(this,emt)" required>
		  <span id="emt"></span>
		 </div>
		  <div class="form-group">
		  <label>Subject</label> 
		  <input placeholder="Enter Subject" id="Subject" name="txtsubject" type="text" class="form-control" value='<?php echo($subject) ?>' onchange="onlyalpha(this,sub)" required>
		  <span id="sub"></span>	
		 </div>
		 <div class="form-group">
		  <label>Description</label> 
		  <input placeholder="Enter Description" id="description" name="txtdescription" type="text" class="form-control" value='<?php echo($description) ?>'>
		 </div>
		  <div class="form-group">
		  <label>User Name</label> 
		  <select name="lstusername" class="form-control" value='<?php echo($username) ?>'> 
			<?php 
			  $query="select regid,username from register";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
		        echo("<option value=".$rw["regid"] .">".$rw["username"]."</option>");
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
		</section>
		</section>
</form>
   	<?php include('jslink.php') ?>
</body>
</html>
