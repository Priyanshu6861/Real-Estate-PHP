<html>
<title>Aminity Form</title>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/DataClass.php');
	?>
	<script src="../validation.js"></script>
	 
	<?php
	  $aminityid="";
	  $aminityname="";
	  $description="";
	  $propid="";
	  $filename="";
	  $tmpname="";
      $msg="";
	  $query="";
	  $dc=new DataClass();
	?>
	
	<?php
    if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }

	 if(isset($_POST['btnsave']))
	 {
	    $aminityname=$_POST['txtaminityname'];
	    $filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$description=$_POST['txtdescription'];
		$propid=$_SESSION['propid'];
	    $query="";
         
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$aminityid.".".$ext;	
		 }
	   if($_SESSION['trans']="new")
	   {
		 $aminityid=$dc->primary("select max(aminityid) from aminity"); 
		 if(isset($_FILES['fupimage'])|| $filename!='')
	 	 
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$aminityid.".".$ext;	
			
		 }  
		 $query="insert into aminity(aminityid,aminityname,description,filename,propid) values('$aminityid','$aminityname','$description','$filename','$propid')";
	 }	
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"aminityimages/".$filename);
		  }
		  $_SESSION['trans']="";
		  header('location:propertyshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
	 }
	 if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:propertyshow.php');
	 }	 
   ?>
    <script>
		function checksubmit()
		{
			if(amtynm.innerHTML!="")
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
  </head>
  <body>
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
	<div id="wrapper" class="home-page">
	
	  <?php include('header.php');  ?>
	  <?php include('menu.php');  ?>
	
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>aminity</span></p>
            <h1 class="mb-3 bread">AMINITIES</h1>
          </div>
        </div>
      </div>
    </div>
	
	<section class="ftco-section contact-section bg-light">
      <div class="container">
	  <div class="row">
	  <div class="col-md-4"></div>
        <div class="row block-9">
         
          <div class="row"> 
           <div class=" bg-white p-5 contact-form" >
          	<div class="form-group">
	         <label>Aminity Name</label>
	         <input type="text" name="txtaminityname" id="amtynhhm" class="form-control" placeholder="Enter Aminity Name" value='<?php echo($aminityname) ?>' onchange="onlyalpha(this,amtynm)" required>
	        <span id="amtynm"></span>
		   </div>
	        <div class="form-group">
	         <label>Image</label> 
	         <input id="file" name="fupimage" type="file" class="form-control" onchange="checkAndFilterFiles()" required>
			 <label id="imagePreview"></label>
	        </div>
	        <div class="form-group">
	         <label>Description</label>
	         <textarea name="txtdescription" class="form-control" placeholder="Enter Description" rows="4" onchange="checklength(this,dsc,5,100)"><?php echo($description) ?> </textarea> 
	        <span id="dsc"></span>
			</div>
	        <div class="form-group" style="margin-top:30px">
		    <input type="submit" name="btnsave" value="Submit" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
	     	<input type="submit" name="btncancel" value="Cancel"  formnovalidate name="cancel" class="btn btn-danger py-3 px-5">
	        </div>
	        <div class="form-group">
	         <label class="lbl" <?php echo($msg); ?> </label>
	        </div>
          </div>
         </div>
       </div>
      </div>
	  </div>
    </section>
		
    <?php include('footer.php');  ?>
  
</div>	
   <?php include('jslink.php');  ?>
 
   </form>
  </body>
  
</html>