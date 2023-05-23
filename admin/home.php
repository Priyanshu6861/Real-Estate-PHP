<html>
<head>
    <?php 
	session_start(); 
    include('csslink.php');
    include("../class/dataclass.php");
    ?>
	<?php
	  $dc=new dataclass();
	?>
</head>
<body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="admin-page">
	
		<?php include('header.php') ?>
        <?php include('sidebar.php') ?>
		 <?php
		 
		 $query="select count(regid) from register where usertype='Buyer'";
		 $totalbuyer=$dc->getcount($query);
		 
		 $query="select count(regid) from register where usertype='Seller'";
		 $totalbuilder=$dc->getcount($query);
		 
		  $query="select count(regid) from register where usertype='Admin'";
		 $totaladmin=$dc->getcount($query);
		 
		 $query="select count(bookid) from booking ";
		 $totalbooking=$dc->getcount($query);
		 
		 $query="select count(contactid) from contact";
		 $totalcontact=$dc->getcount($query);
		 
		 $query="select count(inqid) from inquiry";
		 $totalinquiry=$dc->getcount($query);
		 
		  $query="select count(payid) from payment";
		 $totalpayment=$dc->getcount($query);
		 
		 $query="select count(propid) from property";
		 $totalproperty=$dc->getcount($query);
			  ?>
		<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		 <div class="table-agile-info">
		   <h1 style="text-align: center"> Good To See You Again <i class="fa fa-smile-o" ></i></h1>
		   </div>
		<div class="market-updates">
		<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users fa-3x" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>BUYERS</h4>
						<h3> <?php echo($totalbuyer)?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-male fa-3x" style="color:white"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>SELLER</h4>
					<h3> <?php echo($totalbuilder)?></h3>
					
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-user fa-3x" style="color:white"> </i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>ADMIN</h4>
						<h3><?php echo($totaladmin)?></h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-book fa-3x" style="color:white" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4> BOOKING</h4>
						<h3><?php echo($totalbooking)?></h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>

			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4" style="margin:20px 0px 10px 0px">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-phone" aria-hidden="true" style="font-size: 3em;color: #fff;text-align: left"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>CONTACT</h4>
						<h3><?php echo($totalcontact)?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3" style="margin:20px 0px 10px 0px">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-exclamation-circle " style="font-size: 3em;color: #fff;text-align: left"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>INQUIRY</h4>
						<h3><?php echo($totalinquiry)?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2" style="margin:20px 0px 10px 0px">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-credit-card " style="font-size: 3em;color: #fff;text-align: left"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>PAYMENTS</h4>
					<h3> <?php echo($totalpayment)?></h3>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1" style="margin:20px 0px 10px 0px">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-building-o" style="font-size: 3em;color: #fff;text-align: left"	></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>PROPERTY</h4>
						<h3> <?php echo($totalproperty)?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
		</div>
	    </section>
		 <div class="table-agile-info" style="padding:30px 30px 30px 30px;margin:0px 0px 30px 0px">
		   <p style="font-size:23px"><i class="fa fa-arrow-right" ></i> Complete, submit, and file real estate documents, agreements, and lease records</p>
		   <p style="font-size:23px"><i class="fa fa-arrow-right" ></i> Respond to texts, emails, and phone calls</p>
		   <p style="font-size:23px"><i class="fa fa-arrow-right" ></i> Update website and User profiles</p>
		   </div>
          
		
		</section>
		
        <?php include('jslink.php') ?>
</div>
</form>
</body>

</html>
