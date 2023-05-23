<html>
<head>
<title>Gallery Form</title>
<script src="../validation.js"></script>
			
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>

     <?php 
     $imgid="";
	 $imgdate="";
	 $title="";
	 $imgtype="";
	 $imgsize="";
	 $description="";
	 $filename="";
	 $tmpname="";
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
	   $imgid=$_SESSION['imgid'];
	   $query="select * from gallery where imgid='$imgid'";
	   $rw=$dc->getRecord($query);
	   $imgdate=$rw['imgdate'];
	   $title=$rw['title'];
	   $description=$rw['description'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $imgdate=date('y-m-d');
		$title=$_POST['txttitle'];
	    $filename=$_FILES['fupimage']['name'];
		$imgtype=$_FILES['fupimage']['type'];
	    $imgsize=$_FILES['fupimage']['size'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$description=$_POST['txtdescription'];
	    $query="";	 
	   
	    if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$imgid.".".$ext;	
		 }
	   
	  if($_SESSION['trans']=="new")
	  {
		 $imgid=$dc->primary("select max(imgid) from gallery"); 
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$imgid.".".$ext;	
		 }
	     $query="insert into gallery(imgid,imgdate,title,imgtype,imgsize,filename,description) values('$imgid','$imgdate','$title','$imgtype','$imgsize','$filename','$description')";
	  }
	  if($_SESSION['trans']=="update")
	 {
	   $imgid=$_SESSION['imgid'];  
	   if(isset($_FILES['fupimage'])|| $filename!='')
	    {	
	     $query="update gallery set imgdate='$imgdate',title='$title',imgtype='$imgtype',imgsize='$imgsize',filename='$filename',description='$description' where imgid='$imgid'";
	   }
	   else
	   {
	     $query="update gallery set imgdate='$imgdate',title='$title',filename='$filename',description='$description' where imgid='$imgid'";
	   }
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"gallery/".$filename);
		  }
		  $_SESSION['trans']="";
		  header('location:galleryshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:galleryshow.php');
	 } 
   ?>
   
     <script>
		function checksubmit()
		{
			if(tit.innerHTML!="")
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
      Gallery Form
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
		  <label>Title</label> 
		  <input placeholder="Enter title" id="title" name="txttitle" type="text" class="form-control" value='<?php echo($title) ?>' onchange="checklength(this,snm,5,30) " required>
		  <span id="tit"></span>
		  <div class="form-group">
		  <label>File Name</label> 
		  <input id="fname" name="fupimage" type="file" class="form-control">
		 </div>
		 
		<div class="form-group">
		  <label>Description</label> 
		  <textarea id="desc" name="txtdescription" class="form-control" rows="4"> <?php echo($description) ?> </textarea>
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
