<!DOCTYPE html>
<html> 
<title>Feedback</title>
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/DataClass.php");
   ?> 
   
    <?php
     $msg="";
     $dc=new DataClass();
	 
	  if(isset($_POST['btnreport']))
	  {
		$_SESSION['trans']="";   
		header('location:feedbackreport.php');  
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
     Feedback Show
    </div>
	 <div class="row w3-res-tb">
     <div class="col-sm-1">
			<button type='submit' name="btnreport" class="btn btn-primary" value="Report">Export</a>
			</div>
			<div class="col-sm-8">
			</div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>	
			<th>Feedback Date</th>
			<th>Feedback</th>
			<th>Rating</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
        $query="select feedbackid,feeddate,rv.regid,feedback,rating from feedback rv,register r where rv.regid=r.regid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['feeddate']."</td>");
			echo("<td>".$rw['feedback']."</td>");
			echo("<td>".$rw['rating']."</td>");
			echo("</tr>");
				$count++;
			}
			echo("</tbody>");
			echo("<tr>");
			echo("<td>Total : ".$count."</td>");
			echo("</tr>");
		 ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
      
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