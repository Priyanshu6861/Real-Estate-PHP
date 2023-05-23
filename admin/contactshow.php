<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<title>Contacts</title>
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
     if(isset($_POST['btnreply']))
	 {
	   $contactid=$_POST['btnreply'];
	   $query="update contact set reply='yes' where contactid='$contactid'";
	   $result=$dc->saveRecord($query);
	   if($result)
	   {
	     $msg="Reply Successfully...";
	   }
	   else
	   {
	     $msg="Not Reply...";
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
      Contact Show
    </div>
   
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
		  <th>contact ID</th>
			<th>contact date</th>
			<th>Person Name</th>
			<th>Details</th>
			<th>Contact No</th>
			<th>Email ID</th>
			<th>Reply</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		$query="select * from contact where reply='no'";
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['contactid']."</td>");
			echo("<td>".$rw['contactdate']."</td>");
			echo("<td>".$rw['personname']."</td>");
			echo("<td>".$rw['details']."</td>");
			echo("<td>".$rw['contactno']."</td>");
			echo("<td>".$rw['emailid']."</td>");
			echo("<td><button type='submit' class='btn btn-primary' name='btnreply' value='".$rw['contactid']."'>REPLY</button></td>");
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
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
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