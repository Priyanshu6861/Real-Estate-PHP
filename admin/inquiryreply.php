<html>
<title>Inquiry Reply</title>
<head>

  <?php
    session_start(); 
    include("csslink.php");
	include("../class/dataclass.php");
  ?>
  
  <?php
    $inqid="";
	$inqdate="";
	$buyerid="";
	$details="";
	$inqfor="";
	$response="";
	$status="";
	$msg="";
	$dc=new dataclass();
  ?>
  
  
  <?php
   if(isset($_POST['btnreply']))
   {
     $inqid=$_POST['btnreply'];
	 $query="select * from inquiry where inqid='$inqid'";
	 $rw=$dc->getRecord($query);
	 $_SESSION['inqid']=$rw["inqid"];
	 $details=$rw["details"];
   }
  
   if(isset($_POST['btnsubmit']))
   {
     $inqid=$_SESSION['inqid'];
     $response=$_POST['txtresponse'];
	 $query="update inquiry set response='$response',status='complete' where inqid='$inqid'";
	  //echo($query);
	 $result=$dc->saveRecord($query);
	 if($result)
	 {
	    $msg="Reply Submit Successfully";
	 }
	 else
	 {
	      $msg="reply not Submited";
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
      Inquiry Reply
    </div>
    <div class="row w3-res-tb">
			<div class="col-sm-8">
			</div>
     
    </div>
    <div class="table-responsive">
     <table class="table table-striped b-t b-light">
        <thead>
          <tr>
			<th>INQUIRY DATE</th>
			<th>BUYER NAME</th>
			<th>DETAILS</th>
			<th>INQUIRY FOR</th>
			<th>Response</th>
          </tr>
        </thead>
        <tbody>
  
  		
			     <?php
				   $query="select * from inquiry where status='pending'";
				   $tb=$dc->getTable($query);   				  
				   while($rw=mysqli_fetch_array($tb))
				   {
					  echo("<tr>");
					  echo("<td>".$rw['inqid']."</td>");
				      echo("<td>".$rw['inqdate']."</td>");
					  echo("<td>".$rw['details']."</td>");
					  echo("<td>".$rw['inqfor']."</td>");
					  echo("<td>".$rw['response']."</td>");
					  echo("<td><button class='btn btn-primary' type='submit' name='btnreply' value=".$rw['inqid'].">reply</button></td>");
					  echo("</tr>");
				   }
	      	 ?>
	    </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
       
		<div class="form-group">
                   <label>Inquiry Details</label><br>
				   <input type="text" value="<?php echo($details) ?>" class="form-control" disabled>
                </div>
			   
			   <div class="form-group">
                   <label>Inquiry Reply</label>
                   <input type="text" class="form-control" name="txtresponse" value='' placeholder="Enter reply" >
			   </div>
			  
			   <div class="form-group">
                  <input type="submit" class="btn btn-success" name="btnsubmit" value="Submit">
				  <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
               </div>
		  <div class="Row">
		       <div class="col-md-12">
					<h4> <?php echo($msg) ?> </h4>
			   </div>
		</div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
  </form>
</div>
  <?php
    include("jslink.php");
  ?>
  		
</body>
</html>