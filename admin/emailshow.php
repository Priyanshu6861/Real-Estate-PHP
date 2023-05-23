<!DOCTYPE html>
<html> 
<title>Email</title>
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
	 if(isset($_POST['btnnew']))
	  {
		$_SESSION['trans']="new";   
		header('location:emailform.php');  
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
     Email Show
    </div>
    <div class="row w3-res-tb">
     <div class="col-sm-1">
			<button type='submit' class='btn btn-primary' name='btnnew' value="New">New</button>
			</div>
			<div class="col-sm-8">
			</div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Email ID</th>
			<th>Email Date</th>
			<th>Email From</th>
			<th>Email To</th>
			<th>Subject</th>
			<th>User Name</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select e.emailid,emaildate,emailfrom,emailto,subject,username from email e,register r where e.regid=r.regid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['emailid']."</td>");
			echo("<td>".$rw['emaildate']."</td>");
			echo("<td>".$rw['emailfrom']."</td>");
			echo("<td>".$rw['emailto']."</td>");
			echo("<td>".$rw['subject']."</td>");
			echo("<td>".$rw['username']."</td>");
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
			echo("</tr>");
			
		 ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
        
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
</div>
  </form>
    <?php include("jslink.php") ?>
</body>
</html>