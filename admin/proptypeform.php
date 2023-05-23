<html>
<title>Property Type Form</title>
<head>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>
<script src="../validation.js"></script>
     <?php
   
     $proptypeid="";
	 $proptypename="";
	 $shortname="";
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
	   $proptypeid=$_SESSION['proptypeid'];
	   $query="select * from `proptype` where proptypeid='$proptypeid'";
	   $rw=$dc->getRecord($query);
	   $proptypename=$rw['proptypename'];
	   $shortname=$rw['shortname'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $proptypename=$_POST['txtproptypename'];
	    $shortname=$_POST['txtshortname'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	    $query="insert into `proptype`(proptypename,shortname) values('$proptypename','$shortname')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $proptypeid=$_SESSION['proptypeid'];  
	   $query="update `proptype` set proptypename='$proptypename',shortname='$shortname' where proptypeid='$proptypeid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:proptypeshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:proptypeshow.php');
	 } 
   ?>
   <script>
		function checksubmit()
		{
			if(tlt.innerHTML!="" || sn.innerHTML!="")
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
      Proptype Form
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
		  <div class="form-gropup">
		  <label>Proptype Name</label> 
		  <input placeholder="Enter proptype Name" id="proptypename" name="txtproptypename" type="text" class="form-control" autofocus value='<?php echo($proptypename) ?>' onchange="onlyalpha(this,tlt)">
		   <span id="tlt"></span>
		   </div>
		  <div class="form-group">
		  <label>Short Name</label> 
		  <input placeholder="Enter Short Name" id="shortname" name="txtshortname" type="text" class="form-control" value='<?php echo($shortname) ?>' onchange="onlyalpha(this,sn)">
		  <span id="sn"></span>
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
