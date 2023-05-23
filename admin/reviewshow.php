<!DOCTYPE html>
<html>
<title>Review</title>
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
		header('location:reviewreport.php');  
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
     Review Show
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
            <th>Review ID</th>
			<th>Review Date</th>
			<th>User Name</th>
			<th>Review</th>
			<th>Rating</th>
			<th>Property Name</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		$query="select reviewid,reviewdate,review,rating,username,propname from review rv,register r,property p where rv.regid=r.regid and rv.propid=p.propid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['reviewid']."</td>");
			echo("<td>".$rw['reviewdate']."</td>");
			echo("<td>".$rw['username']."</td>");
			echo("<td>".$rw['review']."</td>");
			echo("<td>".$rw['rating']."</td>");
			echo("<td>".$rw['propname']."</td>");
			echo("</tr>");
				$count++;
			}
			echo("</tbody>");
			echo("<tr>");
			
			echo("<td>Total :  ".$count."</td>");
			
			echo("</tr>");
		 ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
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