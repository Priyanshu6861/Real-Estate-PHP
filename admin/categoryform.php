<html>
<title>Category Form</title>
<head>
	<script src="../validation.js"></script>	
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>

     <?php
     $catid="";
	 $catname="";
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
	   $catid=$_SESSION['catid'];
	   $query="select * from category where catid='$catid'";
	   $rw=$dc->getRecord($query);
	   $catname=$rw['catname'];
	   $shortname=$rw['shortname'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $catname=$_POST['txtcatname'];
	    $shortname=$_POST['txtshortname'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	    $query="insert into category(catname,shortname) values('$catname','$shortname')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $catid=$_SESSION['catid'];  
	   $query="update category set catname='$catname',shortname='$shortname' where catid='$catid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:categoryshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:categoryshow.php');
	 } 
   ?>
   
    <script>
		function checksubmit()
		{
			if(cname.innerHTML!="" || sn.innerHTML!="")
			{
				msg.innerHTML="Form is not valid";
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
      Category Form
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
		  <label>Category Name</label> 
		  <input placeholder="Enter category Name" id="catname" name="txtcatname" type="text" class="form-control" autofocus value='<?php echo($catname) ?>' onchange="onlyalpha(this,cname)" required>
		  <span id="cname"></span>
		  </div>
		  <div class="form-group">
		  <label>Short Name</label> 
		  <input placeholder="Enter Short Name" id="shortname" name="txtshortname" type="text" class="form-control" value='<?php echo($shortname) ?>' onchange="checklength(this,sn,3,5) " required>
		  <span id="sn"></span>
		 </div>
		 
		 <div class="form-group">
		    <input id="save" name="btnsave" type="submit" class="btn btn-success" value="Save">
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
