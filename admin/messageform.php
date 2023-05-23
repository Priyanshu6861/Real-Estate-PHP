<html>
<title>Message Form</title>
<head>
	<script src="../validation.js"></script>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>
	 <?php
     $msg="";
     $dc=new DataClass();
   ?>

     <?php
   
     $msgid="";
	 $msgdate="";
	 $msg="";
	 $mobileno="";
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
		
	    $msgdate=date('y-m-d');
		$msg=$_POST['txtmsg'];
	    $mobileno=$_POST['txtmobileno'];
		$regid=$_POST['lstusername'];
	    $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into message(msgdate,msg,mobileno,regid) values('$msgdate','$msg','$mobileno','$regid')";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:messageshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:messageshow.php');
	 } 
   ?>
    <script>
		function checksubmit()
		{
			if(mob.innerHTML!="")
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
      Message Form
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
		 
		  <div class="form-group">
		  <label>Message</label> 
		  <input placeholder="Enter Message" id="msg" name="txtmsg" type="text" class="form-control" value='<?php echo($msg) ?>' required>
		  <span id="msg"></span>
		 </div>
		 <div class="form-group">
		  <label>Mobile No</label> 
		  <input placeholder="Enter Mobile No" id="mobileno" name="txtmobileno" type="text" class="form-control" value='<?php echo($mobileno) ?>' onchange="checkmobileno(this,mob)" required>
		  <span id="mob"></span>
		 </div>
		  <label>User Name</label> 
		  <select name="lstusername" class="form-control"> 
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
 </div>
 
 </section>
    </section>
	</div>
	</form>

   	<?php include('jslink.php') ?>
</body>

</html>
