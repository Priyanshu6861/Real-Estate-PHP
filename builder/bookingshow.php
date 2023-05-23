<html>
<title>Booking List</title>
<head>	
	<?php 
     session_start(); 
     include("csslink.php");
     include("../class/DataClass.php");
   ?> 
   
    <?php
     $msg="";
     $dc=new DataClass();
   ?>
   
   <?php
     if(isset($_POST['btndelete']))
	 {
	   $bookid=$_POST['btndelete'];
	   $query="delete from booking where bookid='$bookid'";
	   $result=$dc->saveRecord($query);
	   if($result)
	   {
	     $msg="Delete Record Successfully...";
	   }
	   else
	   {
	     $msg="Record not Deleted...";
	   }
	 }
	 if(isset($_POST['btnnew']))
	  {
		$_SESSION['trans']="new";   
		header('location:../buyer/bookingform.php');  
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
      <div class="container" name="book">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Booking</span></p>
            <h1 class="mb-3 bread">Booking</h1>
          </div>
        </div>
      </div>
    </div>
 <section class="ftco-section bg-light">
 <div class="bg-white p-5 contact-form">
    	<div class="container">
    		<div class="row">
   <table class="table table-hover" style="text-align:center">
    <thead class="active">
      <tr>
        <th>Book Date</th>
        <th>Property Name</th>
        <th>Buyer Name</th>
		<th>Amount</th>
        <th>Conditions</th>
        <th>Description</th>
		<th>Document</th>
        <th>Seller Name</th>
      </tr>
    </thead>

    <tbody>
      <?php 
	     $bookid=$_SESSION['regid'];
		$query="select bookid,bookdate,propname,buyername,amount,b.conditions,b.description,document,sellername from booking b,property p,buyer br,seller s where b.propid=p.propid and b.buyerid=br.buyerid and b.sellerid=s.sellerid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['bookdate']."</td>");
			echo("<td>".$rw['propname']."</td>");
			echo("<td>".$rw['buyername']."</td>");
			echo("<td>".$rw['amount']."</td>");
			echo("<td>".$rw['conditions']."</td>");
			echo("<td>".$rw['description']."</td>");
			echo("<td>".$rw['document']."</td>");
			echo("<td>".$rw['sellername']."</td>");
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
