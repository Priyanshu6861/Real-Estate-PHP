<html>
<title>Payment Successful</title>
<head>	
	<?php 
     session_start(); 
     include("csslink.php");
     include("../class/DataClass.php");
   ?> 
   
    <?php	
     $msg="";
     $dc=new DataClass();
	 
	 if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }		 
		 $propid=$_SESSION['propid'];
		 $query="select propname,(price*20)/100 as amount1 from property where propid='$propid'";
		 $rw=$dc->getRecord($query);
		 $propname=$rw['propname'];
		 $_SESSION['propname']=$propname;
		 $amount2=$rw['amount1'];
		 $_SESSION['amount2']=$amount2;
		
		 $buyerid=$_SESSION['regid'];
		 // echo($regid);
		 $query="select * from buyer where buyerid='$buyerid'";
		 $rw=$dc->getRecord($query);
		  //echo($amount2);
		 $buyername=$rw['buyername'];
		$_SESSION['buyername']=$buyername;
	 	
	   if(isset($_POST['btncancel']))
	  {   
		header('location:home.php');
	  }
	  
   ?>
   
</head>
<body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
        <?php include('header.php') ?>
        <?php include('menu.php') ?>
		 
	   <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>payment</span></p>
            <h1 class="mb-3 bread">Successful</h1>
          </div>
        </div>
      </div>
    </div>
	
     <section class="ftco-section contact-section bg-light">
 <div class="col-md-12 mb-4">
            <h1 class="h3" style="margin-left: 105px" >Hello, We've confirmed your payment. We will send you further status updates.</h1>
          </div>
    <div class="container" >
	<div class="row">
	<div class="info bg-white p-4">
     <table class="table table-hover"  style="text-align:center">
      <thead>
      <tr>
		<th>Property Name</th>
        <th>Buyer Name</th>
		<th>Amount</th>
		
      </tr>
    </thead>
    <tbody>
      <?php 
		
			echo("<tr>");
			echo("<td>$propname</td>");
			echo("<td>$buyername</td>");
			echo("<td>$amount2</td>");
			echo("</tr>");
		 ?>
    </tbody>
  </table>	
  <div class="form-group" >
  <input type="submit" name="btncancel" value="Back" formnovalidate name="cancel" class="btn btn-danger px-5" />
  </div>
  </div>
  </div>
  </div>
  </section>

        <?php include('footer.php') ?>
        <?php include('jslink.php') ?>
</div>
</form>
</body>
Hello,We’ve confirmed your payment. We will send you further status updates.

</html>
