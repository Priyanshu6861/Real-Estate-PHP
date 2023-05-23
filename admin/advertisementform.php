<html>
<title>Advertisement Form</title>
   <head>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>
	<script src="../validation.js"></script>
	
     <?php
     $advid="";
	 $advdate="";
	 $filename="";
	 $tmpname="";
	 $sellerid="";
	 $propid="";
	 $description="";
	 $title="";
	 $dc=new DataClass();
	 $msg1="";
	 $msg2="";
   ?>
     <?php
	 if($_SESSION['trans']=="update")
	 {
	   $advid=$_SESSION['advid'];
	   $query="select * from advertisement where advid='$advid'";
	   $rw=$dc->getRecord($query);
	   $advdate=$rw['advdate'];
	   $sellerid=$rw['sellerid'];
	   $propid=$rw['propid'];
	   $description=$rw['description'];
	   $title=$rw['title'];
	 }
	 if(isset($_POST['btnsave']))
	 {
		
		$advdate=date('y-m-d');
	    $filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$sellerid=$_POST['lstseller'];
		$propid=$_POST['lstproperty'];
		$description=$_POST['txtdescription'];
	    $title=$_POST['txttitle'];
	    $query="";
		
        if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$advid.".".$ext;	
		 }	   
	  if($_SESSION['trans']=="new")
	  {
		 $advid=$dc->primary("select max(advid) from advertisement"); 
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$advid.".".$ext;	
		 }
	     $query="insert into advertisement(advid,advdate,filename,sellerid,propid,description,title) values('$advid','$advdate','$filename','$sellerid','$propid','$description','$title')";
	  }
	   if($_SESSION['trans']=="update")
	  {
	   $advid=$_SESSION['advid'];  
	   if(isset($_FILES['fupimage'])|| $filename!='')
	  {
	   $query="update advertisement set advdate='$advdate',filename='$filename',sellerid='$sellerid',propid='$propid',description='$description',title='$title' where advid='$advid'";
	  }
	  }
	 $result=$dc->saveRecord($query);
	 if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"advertisementimage/".$filename);
		  }
		  $_SESSION['trans']="";
		  header('location:advertisementshow.php');
	  }
		else
		{
		  $msg="Profile not updated...";
		}
	 }
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:advertisementshow.php');
	 }	 
   ?>
    <script>
		function checksubmit()
		{
			if(tlt.innerHTML!="")
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
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
    <div id="wrapper">
        <?php include('header.php') ?>
        <?php include('sidebar.php') ?>
		
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Advertisement Form
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
	     <label>Image</label> 
	      <input id="fname" name="fupimage" type="file" class="form-control" required>
	     </div>
		 
		  <div class="form-group">
		  <label>Seller Name</label> 
		  <select name="lstseller" class="form-control"> 
			<?php 
			  $query="select sellerid,sellername from seller";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
		        echo("<option value=".$rw["sellerid"] .">".$rw["sellername"]."</option>");
			  }
			?>
		  </select>
		 </div>
		 
		  <div class="form-group">
		  <label>Property Name</label> 
		  <select name="lstproperty" class="form-control"> 
			<?php 
			  $query="select propid,propname from property";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
		        echo("<option value=".$rw["propid"] .">".$rw["propname"]."</option>");
			  }
			?>
		  </select>
		 </div>
		 
		 <div class="form-group">
		  <label>Description</label> 
		  <input placeholder="Enter Pincode" id="description" name="txtdescription" type="text" class="form-control" value='<?php echo($description) ?>' onchange="checklength(this,dsc,5,100)">
		 <span id="dsc"></span>
		 </div>
		 
		 <div class="form-group">
		  <label>Title</label> 
		  <input placeholder="Enter Short Name" id="title" name="txttitle" type="text" class="form-control" value='<?php echo($title) ?>' onchange="onlyalpha(this,tlt)" required>
		 <span id="tlt"></span>
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
	</div>
	</form>
   	<?php include('jslink.php') ?>
</body>
</html>