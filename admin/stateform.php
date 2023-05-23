<html>
<title>State Form</title>
<head>
	<script src="../validation.js"></script>
			
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>

     <?php
   
     $stateid="";
	 $statename="";
	 $shortname="";
	 $countryid="";
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
	   $stateid=$_SESSION['stateid'];
	   $query="select * from state where stateid='$stateid'";
	   $rw=$dc->getRecord($query);
	   $statename=$rw['statename'];
	   $shortname=$rw['shortname'];
	   $countryid=$rw['countryid'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $statename=$_POST['txtstatename'];
	    $shortname=$_POST['txtshortname'];
		$countryid=$_POST['lstcountry'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into state(statename,shortname,countryid) values('$statename','$shortname','$countryid')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $stateid=$_SESSION['stateid'];  
	   $query="update state set statename='$statename',shortname='$shortname',countryid='$countryid' where stateid='$stateid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:stateshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:stateshow.php');
	 } 
   ?>
   
    <script>
		function checksubmit()
		{
			if(sname.innerHTML!="" || sn.innerHTML!="")
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
      State Form
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
		  <label>State Name</label> 
		  <input placeholder="Enter state Name" id="statename" name="txtstatename" type="text" class="form-control" value='<?php echo($statename) ?>'  onchange="onlyalpha(this,sname)" required>
		  <span id="sname"></span>
		  <div class="form-group">
		  <label>Short Name</label> 
		  <input placeholder="Enter Short Name" id="shortname" name="txtshortname" type="text" class="form-control" value='<?php echo($shortname) ?>' onchange="checklength(this,sn,3,5) " required>
		  <span id="sn"></span>
		 </div>
		 <div class="form-group">
		  <label>Country Name</label> 
		  <select name="lstcountry" class="form-control"> 
			<?php
			  $query="select countryid,countryname from country";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
		        echo("<option value=".$rw["countryid"] .">".$rw["countryname"]."</option>");
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
