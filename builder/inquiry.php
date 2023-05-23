<html>
<title>Inquiry List</title>
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Inquiry</span></p>
            <h1 class="mb-3 bread">INQUIRY</h1>
          </div>
        </div>
      </div>
    </div>
	<section class="ftco-section contact-section bg-light">
    <div class="container" >
	<div class="info bg-white p-4">
	 <div class="row">
   <table class="table table-hover"  style="text-align:center">
    <thead>
      <tr>
        <th>Inquiry Date</th>
		<th>Details</th>
        <th>Inquiry For</th>
		<th>Response</th>
		<th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	    $buyerid=$_SESSION['regid'];
		$query="select inqid,inqdate,buyerid,details,inqfor,response,status from inquiry where buyerid='$buyerid'"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['inqdate']."</td>");
			echo("<td>".$rw['details']."</td>");
			echo("<td>".$rw['inqfor']."</td>");
			echo("<td>".$rw['response']."</td>");
			echo("<td>".$rw['status']."</td>");
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
			echo("</tr>");
		 ?>
    </tbody>
  </table>
</div>
  </div>
  </div>
  </section>
        <?php include('footer.php') ?>
        <?php include('jslink.php') ?>
</div>
</form>
</body>

</html>
