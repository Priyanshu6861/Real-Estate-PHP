<html>
<title>Group Form</title>
<head>

			<script src="../validation.js"></script>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>

     <?php
   
     $groupid="";
	 $groupname="";
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
	   $groupid=$_SESSION['groupid'];
	   $query="select * from `group` where groupid='$groupid'";
	   $rw=$dc->getRecord($query);
	   $groupname=$rw['groupname'];
	   $shortname=$rw['shortname'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $groupname=$_POST['txtgroupname'];
	    $shortname=$_POST['txtshortname'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	    $query="insert into `group`(groupname,shortname) values('$groupname','$shortname')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $groupid=$_SESSION['groupid'];  
	   $query="update `group` set groupname='$groupname',shortname='$shortname' where groupid='$groupid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:groupshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:groupshow.php');
	 } 
   ?>
   
    <script>
		function checksubmit()
		{
			if(gname.innerHTML!="" || snm.innerHTML!="")
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
      Group Form
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
		  <label>Group Name</label> 
		  <input placeholder="Enter group Name" id="groupname" name="txtgroupname" type="text" class="form-control" autofocus value='<?php echo($groupname) ?>'  onchange="onlyalpha(this,gname)" required>
		  <span id="gname"></span>
		  <div class="form-group">
		  <label>Short Name</label> 
		  <input placeholder="Enter Short Name" id="shortname" name="txtshortname" type="text" class="form-control" value='<?php echo($shortname) ?>' onchange="checklength(this,snm,3,5) " required>
		   <span id="snm"></span>
		 </div>
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
