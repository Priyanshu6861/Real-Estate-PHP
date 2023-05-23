<html>
<title>Unit Form</title>
<head>
<script src="../validation.js"></script>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>

     <?php
   
     $unitid="";
	 $unitname="";
	 $squarefeet="";
	 $squaremeter="";
	 $propid="";
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
	   $unitid=$_SESSION['unitid'];
	   $query="select * from unit where unitid='$unitid'";
	   $rw=$dc->getRecord($query);
	   $unitname=$rw['unitname'];
	   $squarefeet=$rw['squarefeet'];
	   $squaremeter=$rw['squaremeter'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $unitname=$_POST['txtunitname'];
		 $squarefeet=$_POST['txtsquarefeet'];
		  $squaremeter=$_POST['txtsquaremeter'];
		  
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into unit(unitname,squarefeet,squaremeter,propid) values('$unitname','$squarefeet','$squaremeter')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $unitid=$_SESSION['unitid'];  
	   $query="update unit set unitname='$unitname',squarefeet='$squarefeet',squaremeter='$squaremeter' where unitid='$unitid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:unitshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:unitshow.php');
	 } 
   ?>
   
 <script>
		function checksubmit()
		{
			if(uname.innerHTML!="" || sqr.innerHTML!="" || sqrm.innerHTML!="")
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
    <form name="frmhome" action="#" method="post" onsubmit="return checksubmit()">
    <div id="wrapper">
        <?php include('header.php') ?>
        <?php include('sidebar.php') ?>
		
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Unit Form
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
		  <label>Unit Name</label> 
		  <input placeholder="Enter unit Name" id="unitname" name="txtunitname" type="text" class="form-control" value='<?php echo($unitname) ?>' onchange="onlyalpha(this,uname)" required>
		   <span id="uname"></span>
		  <div class="form-group">
		  <label>Squarefeet</label> 
		  <input placeholder="Enter squarefeet" id="squarefeet" name="txtsquarefeet" type="text" class="form-control" value='<?php echo($squarefeet) ?>' required>
		   <span id="sqr"></span>
		 </div>
		 <div class="form-group">
		  <label>Squaremeter</label> 
		  <input placeholder="Enter squaremeter" id="squaremeter" name="txtsquaremeter" type="text" class="form-control" value='<?php echo($squaremeter) ?>'  required>
		   <span id="sqrm"></span>
		 </div>
		  </select>
		 </div>
		 <div class="form-group">
		    <input id="save" name="btnsave" type="submit" class="btn btn-success" value="Save" onclick="return checksubmit()">
			<input id="cancel" name="btncancel" type="submit" formnovalidate name="cancel" class="btn btn-danger" value="Cancel">
		 </div>
			<div class="form-group">
			<label id="msg"></label>
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
