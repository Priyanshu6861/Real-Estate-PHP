<html>
<title>Bookings</title>
<head>	
	<?php 
     session_start(); 
     include("csslink.php");
     include("../class/DataClass.php");
   ?> 
   
    <?php
	$buyerid=$_SESSION['regid'];
	//echo($buyerid);	
     $msg="";
     $dc=new DataClass();
	 
	   if(isset($_POST['btncancel']))
	  {
		$bookid=$_POST['btncancel'];  
		$_SESSION['bookid']=$bookid;
		$_SESSION['trans']="cancel";   
		header('location:bookingcancel.php');
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
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>booking</span></p>
            <h1 class="mb-3 bread">Booking</h1>
          </div>
        </div>
      </div>
    </div>
	
     <section class="ftco-section contact-section bg-light">
 <div class="col-md-12 mb-4">
            <h1 class="h3" style="margin-left: 105px">Booked Property</h1>
          </div>
    <div class="container" >
	<div class="info bg-white p-4">
     <table class="table table-hover"  style="text-align:center">
      <thead>
      <tr>
        <th>Booking Date</th>
        <th>Property Name</th>
		<th>Buyer Name</th>
		<th>Amount</th>
		<th>Document</th>
		<th>Seller Name</th>
		<th>Cancel Property</th>
		
      </tr>
    </thead>
    <tbody id='myTable'>
      <?php 
	    $buyerid=$_SESSION['regid'];
		$query="select bookid,bookdate,propname,buyername,amount,conditions,b.description,document,sellername from booking b,property p,buyer y,seller s where  b.propid=p.propid and y.buyerid=b.buyerid and b.sellerid=s.sellerid and b.buyerid='$buyerid'"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['bookdate']."</td>");
			echo("<td>".$rw['propname']."</td>");
			echo("<td>".$rw['buyername']."</td>");
			echo("<td>".$rw['amount']."</td>");
			echo("<td>".$rw['document']."</td>");
			echo("<td>".$rw['sellername']."</td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btncancel' value='".$rw['bookid']."'>Booking Cancel</button></td>");
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");			
			echo("<td></td>");
            echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");
            echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");
			echo("</tr>");
		 ?>
    </tbody>
  </table>
  </div>
  </div>
  </section>

        <?php include('footer.php') ?>
        <?php include('jslink.php') ?>
</div>
</form>
</body>

</html>
