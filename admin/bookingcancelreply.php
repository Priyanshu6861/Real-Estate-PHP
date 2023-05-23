<html>
<title>Booking Reply</title>
<head>

  <?php
    session_start(); 
    include("csslink.php");
	include("../class/dataclass.php");
  ?>
  
  <?php
    $bookcanid="";
	$bookcandate="";
	$buyerid="";
	$propid="";
	$reason="";
	$status="";
	$remarks="";
	$msg="";
	$dc=new dataclass();
  ?>
  
  
  <?php
   if(isset($_POST['btnreply']))
   {
     $bookcanid=$_POST['btnreply'];
	  $query="update bookingcancel set status='cancled' where bookcanid='$bookcanid'";
	  //echo($query);
	 $result=$dc->saveRecord($query);
	 if($result)
	 {
	 //  $query="delete from booking where bookid='$bookcanid'";
	 //  $result=$dc->saveRecord($query);
	    $msg="Booking Cancled Successfully";
	 }
	 else
	 {
	      $msg="Not Cancled";
	 }
	 
   }
  ?>
  <style type="text/css">
     .form-control
	 {
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
   </style>
   
</head>

<body>
   <form name="frm" action="#" method="post">
    <div id="wrapper">
    <?php include("header.php"); ?>
	<?php include("sidebar.php"); ?>
	
	<section id="main-content">
	 <section class="wrapper">
	  <div class="table-agile-info">
       <div class="panel panel-default">
        <div class="panel-heading">
        Booking Cancle Reply
        </div>
       <div class="row w3-res-tb"><div class="col-sm-8"></div></div>
    <div class="table-responsive">
     <table class="table table-striped b-t b-light">
        <thead>
          <tr>
			<th>Booking DATE</th>
			<th>BUYER NAME</th>
			<th>Property Name</th>
			<th>Reason</th>
			<th>Reply</th>
			
			</tr>
        </thead>
        <tbody>
	     <?php
		   $query="select * from bookingcancel where status='pending'";
		   $tb=$dc->getTable($query);   				  
		   while($rw=mysqli_fetch_array($tb))
		   {
			  echo("<tr>");
			  echo("<td>".$rw['bookcandate']."</td>");
			  echo("<td>".$rw['bookid']."</td>");
			  echo("<td>".$rw['propid']."</td>");
			  echo("<td>".$rw['reason']."</td>");
			  echo("<td><button class='btn btn-primary fa fa-check-square' style='width :100%;padding:10px' type='submit' name='btnreply' value=".$rw['bookcanid']."></button></td>");
			  echo("</tr>");
		   }
	      	 ?>
	    </tbody>
      </table>
    </div>
     
  </div>
   <div class="Row">
		       <div class="col-md-12">
					<h4> <?php echo($msg) ?> </h4>
			   </div>
		</div>
</div>
</section>
</section>
</div>
  </form>
  <?php
    include("jslink.php");
  ?>
  		
</body>
</html>