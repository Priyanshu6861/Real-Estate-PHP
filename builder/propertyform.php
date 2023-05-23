<html>
<title>Property Form</title>
<head>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>
<script src="../validation.js"></script>
     <?php
     $propid="";
	 $propname="";
	 $address="";
	 $cityid="";
	 $googlemap="";
	 $proptypeid="";
	 $description="";
	 $price="";
	 $unitid="";
	 $facilities="";
	 $contractor="";
	 $builder="";
	 $architecturer="";
	 $filename="";
	 $tmpname="";
	 $sellerid="";
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
	   
	   $propid=$_SESSION['propid'];
	   $query="select * from property where propid='$propid'";
	   $rw=$dc->getRecord($query);
	   $propname=$rw['propname'];
	   $address=$rw['address'];
	   $cityid=$rw['cityid'];
	   $googlemap=$rw['googlemap'];
	   $proptypeid=$rw['proptypeid'];
	   $description=$rw['description'];
	   $price=$rw['price'];
	   $unitid=$rw['unitid'];
	   $facilities=$rw['facilities'];
	   $contractor=$rw['contractor'];
	   $builder=$rw['builder'];
	   $architecturer=$rw['architecturer'];
	   $filename=$rw['filename'];
	   
	 }
	 
	 
	 if(isset($_POST['btnsave']))
	 {
		$regid=$_SESSION['regid'];
		$propname=$_POST['txtpropname'];
		$address=$_POST['txtaddress'];
		$cityid=$_POST['lstcity'];
		$googlemap=$_POST['txtgooglemap'];
		$proptypeid=$_POST['lstproptype'];
		$description=$_POST['txtdescription'];
		$price=$_POST['txtprice'];
		$unitid=$_POST['lstunit'];
		$facilities=$_POST['txtfacilities'];
		$contractor=$_POST['txtcontractor'];
		$builder=$_POST['txtbuilder'];
		$architecturer=$_POST['txtarchitecturer'];
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$sellerid=$_SESSION['regid'];
		$query="";	

     if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$propid.".".$ext;	
		 }	   
	  if($_SESSION['trans']=="new")
	  {
	     $propid=$dc->primary("select max(propid) from property"); 
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$propid.".".$ext;	
		 }
	    $query="insert into property(propname,address,cityid,googlemap,proptypeid,description,price,unitid,facilities,contractor,builder,architecturer,filename,sellerid) values('$propname','$address','$cityid','$googlemap','$proptypeid','$description','$price','$unitid','$facilities','$contractor','$builder','$architecturer','$filename','$sellerid')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $propid=$_SESSION['propid'];  
	   $query="update property set propname='$propname',address='$address',cityid='$cityid',googlemap='$googlemap',proptypeid='$proptypeid',description='$description',price='$price',unitid='$unitid',facilities='$facilities',contractor='$contractor',builder='$builder',architecturer='$architecturer',filename='$filename','sellerid='$sellerid' where propid='$propid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	 {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"propimage/".$filename);
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
			if(prpnm.innerHTML!="" || addr.innerHTML!="" || bldnm.innerHTML!="" || arcnm.innerHTML!="" || prc.innerHTML!="")
			{
				alert("Form is not valid");
				return false;
			}
			else
			{
				return true;
			}
		}
		function onlynumber(ctrl,msg) 
	 {
		 var data = args.Value;
		 var result = data.match(/[0-9]+/);
		 if (result != data) 
		 {
		   msg.innerHTML="Enter only number..";               
		 }
		 else
		 {
			msg.innerHTML="";
		 }
    }
	</script>
   </style> 
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
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Property</span></p>
            <h1 class="mb-3 bread">Property</h1>
          </div>
        </div>
      </div>
    </div>
	
	
 <div class="row">
    <div class="col-md-1"></div>
   <div class=" bg-white p-3 contact-form" >
	<div class="form-group">
	<label>Property Name</label>
	<input type="text" name="txtpropname" id="propname" class="form-control" placeholder="Enter Property Name" value='<?php echo($propname) ?>' onchange="checklength(this,prpnm,5,30)" required >
	<span id="prpnm"></span>
	</div>
	
	<div class="form-group">
	<label>Address</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4" onchange="checklength(this,addr,5,100)" required><?php echo($address) ?></textarea> 
	<span id="addr"></span>
	</div>		
	
	  <div class="form-group">
		  <label>City Name</label> 
		  <select name="lstcity" class="form-control"> 
		    <?php
			  $query="select cityid,cityname from city";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($location==$rw['cityid'])
            	  echo("<option value=".$rw["cityid"] ." selected>".$rw["cityname"]."</option>");
				else   
		         echo("<option value=".$rw["cityid"] .">".$rw["cityname"]."</option>");
			  }
			?>
		   </select>
	 </div>
	
	 <div class="form-group">
		  <label>Property Type</label> 
		  <select name="lstproptype" class="form-control" value='<?php echo($propid) ?>'> 
		    <?php
			  $query="select proptypeid,proptypename from proptype";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($location==$rw['proptypeid'])
            	  echo("<option value=".$rw["proptypeid"] ." selected>".$rw["proptypename"]."</option>");
				else   
		         echo("<option value=".$rw["proptypeid"] .">".$rw["proptypename"]."</option>");
			  }
			?>
		   </select>
	 </div>
	 <div class="form-group">
		  <label>Unit</label> 
		  <select name="lstunit" class="form-control" value='<?php echo($unitid) ?>'> 
		    <?php
			  $query="select unitid,unitname from unit";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($location==$rw['proptypeid'])
            	  echo("<option value=".$rw["unitid"] ." selected>".$rw["unitname"]."</option>");
				else   
		         echo("<option value=".$rw["unitid"] .">".$rw["unitname"]."</option>");
			  }
			?>
		   </select>
	 </div>	
	 
		
</div>
<div class="col-md-1"></div>	
	<div class=" bg-white p-3 contact-form" >
	 <div class="form-group">
	<label>Description</label>
	<textarea name="txtdescription" class="form-control" placeholder="Enter Description" rows="4" ><?php echo($description) ?></textarea> 
	<span id="descr"></span>
	</div>
	<div class="form-group">
	  <label> Builder</label>
	  <input type="text" name="txtbuilder" class="form-control" placeholder="Enter Builder" value='<?php echo($builder) ?>' onchange="onlyalpha(this,bldnm)" required>
		<label id="bldnm"></label>
	</div>
	
	<div class="form-group">
	  <label>Architecturer</label>
	  <input type="text" name="txtarchitecturer" class="form-control" placeholder="Enter Architecturer" value='<?php echo($architecturer) ?>' onchange="onlyalpha(this,arcnm)" required>
	<label id="arcnm"></label>
	</div>
	 <div class="form-group">
	  <label>Google Map</label>
	  <input type="text" name="txtgooglemap" class="form-control" placeholder="GOOGLE MAP" value='<?php echo($googlemap) ?>'  onchange="checklength(this,ggmp,5,30)">
	<span id="ggmp"></span>
	</div>
	
	
  </div>
   <div class="col-md-1"></div>
   <div class=" bg-white p-3 contact-form" >
	<div class="form-group">
	     <label>Image</label> 
	     <input id="fname" name="fupimage" type="file" class="form-control" onchange="checkAndFilterFiles()" required >
	    <label id="imagePreview"></label>
	   </div>
	<div class="form-group">
	  <label>Price</label>
	  <input type="number" name="txtprice" class="form-control" placeholder="Enter Price" value='<?php echo($price) ?>' class="numbers" onchange="checklength(this,prc,5,15)">
	<span id="prc"></span>
	</div>
	<div class="form-group">
	<label>Facilities</label>
	<textarea name="txtfacilities" class="form-control" placeholder="Enter Facilities" rows="4" onchange="checklength(this,fclt,5,200)"><?php echo($facilities) ?></textarea> 
	<span id="fclt"></span>
	</div>	
	
	<div class="form-group">
	  <label>Contractor</label>
	  <input type="text" name="txtcontractor" class="form-control" placeholder="Enter Contractor" value='<?php echo($contractor) ?>' onchange="onlyalpha(this,cont)">
	<span id="cont"></span>
	</div>
  
	<div class="form-group" style="margin-top:40px">
		<input type="submit" name="btnsave" value="Submit" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
		<input type="submit" name="btncancel" value="Cancel" formnovalidate name="cancel" class="btn btn-danger py-3 px-5" />
	</div>
   </div>
   </div>
  </div>
  </div>	
    <?php include('footer.php');  ?>
  
</div>	
   <?php include('jslink.php');  ?>
   </form>
  </body>
</html>