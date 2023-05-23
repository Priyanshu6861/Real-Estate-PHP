 <html>
 <title>Aminity Form</title>
   <head>
   
		<script src="../validation.js"></script>
		
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>
	
     <?php
     $aminityid="";
	 $aminityname="";
	 $description="";
	 $filename="";
	 $tmpname="";
	 $propid="";
	 $title="";
	 $dc=new DataClass();
	 $msg1="";
	 $msg2="";
   ?>
     <?php
	 if($_SESSION['trans']=="update")
	 {
	   $aminityid=$_SESSION['aminityid'];
	   $query="select * from aminity where aminityid='$aminityid'";
	   $rw=$dc->getRecord($query);
	   $aminityname=$rw['aminityname'];
	   $description=$rw['description'];
	   $propid=$rw['propid'];
	 }
	 if(isset($_POST['btnsave']))
	 {
		$_SESSION['propid']=1;
		$aminityname=$_POST['txtaminityname'];
		$description=$_POST['txtdescription'];
	    $filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$propid=$_POST['lstproperty'];
	    $query="";
		
        if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$aminityid.".".$ext;	
		 }	   
	  if($_SESSION['trans']=="new")
	  {
		 $aminityid=$dc->primary("select max(aminityid) from aminity"); 
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$aminityid.".".$ext;	
		 }
	     $query="insert into aminity(aminityid,aminityname,description,filename,propid) values('$aminityid','$aminityname','$description','$filename','$propid')";
	  }
	   if($_SESSION['trans']=="update")
	  {
	   $aminityid=$_SESSION['aminityid'];  
	   if(isset($_FILES['fupimage'])|| $filename!='')
	  {
	   $query="update aminity set aminityname='$aminityname',description='$description',filename='$filename',propid='$propid' where aminityid='$aminityid'";
	  }
	  }
	 $result=$dc->saveRecord($query);
	 if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"aminityimage/".$filename);
		  }
		  $_SESSION['trans']="";
		  header('location:aminityshow.php');
	  }
		else
		{
		  $msg="Profile not updated...";
		}
	 }
	  if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:aminityshow.php');
	 }	 
   ?>
    <script>
		function checksubmit()
		{
			if(aminame.innerHTML!="")
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
      Aminity Form
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
		  <label>Aminity Name</label> 
		  <input placeholder="Enter Aminity Namw" id="aminityname" name="txtaminityname" type="text" class="form-control" value='<?php echo($aminityname) ?>' onchange="onlyalpha(this,aminame)" required>
		  <span id="aminame"></span> 
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
		  <input placeholder="Enter Description" id="description" name="txtdescription" type="textarea" class="form-control" value='<?php echo($description) ?>' 
		  </div>
		    
		 <div class="form-group">
	     <label>Image</label> 
	      <input id="fname" name="fupimage" type="file" class="form-control">
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