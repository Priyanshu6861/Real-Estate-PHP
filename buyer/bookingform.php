<html>
<title>Booking Form</title>
<head>
    <?php
	session_start();
    include('csslink.php');
    include("../class/DataClass.php");
    ?>
<script src="../validation.js"></script>
	 <?php
	 $bookid="";
	 $bookdate="";
	 $propid="";
	 $buyerid="";
	 $amount="";
	 $conditions="";
	 $description="";
	 $filename="";
	 $tmpname="";
	 $document="";
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
		 $propid=$_SESSION['propid'];
		 $query="select propname,price,(price*20)/100 as amount1 from property where propid='$propid'";
		 $rw=$dc->getRecord($query);
		 $propname=$rw['propname'];
		 $_SESSION['propname']=$propname;
		  $price=$rw['price'];
		 $amount2=$rw['amount1'];
		 $_SESSION['amount2']=$amount2;
		 //echo($amount2);
		
		 $regid=$_SESSION['regid'];
		 // echo($regid);
		 $query="select * from buyer where buyerid='$regid'";
		 $rw=$dc->getRecord($query);
		 $buyername=$rw['buyername'];
		$_SESSION['buyername']=$buyername;
		
		
	 if(isset($_POST['btnbook']))
	 {
			$propid=$_SESSION['propid'];
			$bookdate=date('y-m-d');
			$propname=$_SESSION['propname'];
			$buyerid=$_SESSION['regid'];
			$conditions=$_POST['txtconditions'];
			$description=$_POST['txtdescription'];
			$filename=$_FILES['fupimage']['name'];
		    $tmpname=$_FILES['fupimage']['tmp_name'];
			$sellerid=1;
			
			if(isset($_FILES['fupimage'])|| $filename!='')
			{
			$ext=pathinfo($filename,PATHINFO_EXTENSION);
			$filename="img".$bookid.".".$ext;	
			}
			
			$query="insert into booking(bookdate,propid,buyerid,amount,conditions,description,document,sellerid) values('$bookdate','$propid','$buyerid','$amount2','$conditions','$description','$filename','$sellerid')";
			
			$result=$dc->saveRecord($query);
			if($result)
			{
			if(isset($_FILES['fupimage'])|| $filename!='')
			{
			move_uploaded_file($tmpname,"paydocuments/".$filename);
			}
			$msg1="Booked succefully";
			}
			else
			{
			$msg1="Not Booked";
			}

// code to insert in payment table
			$paydate=date('y-m-d');
			$propid=$_SESSION['propid'];
			$buyerid=$_SESSION['regid'];
			$paytype="onlinepay";
			
			$query="insert into payment(paydate,propid,buyerid,paytype,amount) values('$paydate','$propid','$buyerid','$paytype','$amount2')";
			
			$result=$dc->saveRecord($query);
			if($result)
			{
				header('location:PayuTransaction.php');
			}
			else
			{
			$msg1="Not Booked";
			}
		}
		if(isset($_POST['btncancel']))
	{
	   header('location:home.php');
	}	

   ?>
   <script>
		function checksubmit()
		{
			if(dsc.innerHTML!="" || con.innerHTML!="")
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
	<div id="wrapper" class="home-page">
	
	  <?php include('header.php');  ?>
	  <?php include('menu.php');  ?>
	
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Booking</span></p>
            <h1 class="mb-3 bread">Booking</h1>
          </div>
        </div>
      </div>
    </div>
	<section class="ftco-section bg-light">
	 
	 <div class="col-md-12">
		   <H3 class="icon-rupee" style="padding:0px 0px 50px 300px"> Token Amount Is Payable On 20% Of Total Price</H3>
		  </div>
	<div class="container">
 <div class="row">
    <div class="col-md-2"></div>
   <div class=" bg-white p-5 contact-form" style="padding:24px!important">
     
	 <div class="form-group">
	  <label>Property Name</label>
	  <input type="text" name="txtpropname" class="form-control" value='<?php echo($propname) ?>' disabled>
	 </div>
	
	  <div class="form-group">
		  <label>Buyer Name</label> 
		  <input type="text" name="txtbuyername" class="form-control" placeholder="Enter Buyer Name" value='<?php echo($buyername) ?>' disabled>
	 </div>
	<div class="form-group">
	  <label>Document (Upload Id Proof)</label> 
	  <input id="fname" name="fupimage" type="file" style="padding:-1px;margin:0px -70px 0px 0px"class="form-control" required >
	</div>
		 <div class="form-group">
	  <label>Total Price</label>
	  <input type="text" name="txtpropname" class="form-control" value='<?php echo($price) ?>' disabled>
	 </div>
</div>
	
	<div class=" bg-white p-4 contact-form" >
	 <div class="form-group">
	  <label>Conditions</label>
	  <textarea name="txtconditions" class="form-control" placeholder="Enter conditions" rows="3"><?php echo($conditions) ?></textarea>
	</div>
	
	<div class="form-group">
	  <label>Description</label>
	 <textarea name="txtdescription" class="form-control" placeholder="Enter Description" rows="4" onchange="checklength(this,dsc,5,100)"><?php echo($description) ?></textarea> 
	</div>
	
	<div class="form-group">
	  <label>Payable Token Amount</label>	
	  <input type="text" name="txtamount" class="form-control" placeholder="Enter Amount"  disabled value='<?php echo($amount2); ?>' disabled>
	</div>
	
	<div class="form-group">
		<input type="submit" name="btnbook" value="Submit" class="btn btn-primary py-3 px-5" onclick="return checksubmit()">
		<input type="submit" name="btncancel" value="Cancel" formnovalidate name="cancel" class="btn btn-danger py-3 px-5" />
	</div>
	  </div>
  </div>
  </div>
  </section>
	   </div>
  </div>	
    <?php include('footer.php');  ?>
</div>	
   <?php include('jslink.php');  ?>
   </form>
  </body>
</html>