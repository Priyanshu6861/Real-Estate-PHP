<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>All Users</title>
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
		header('location:registerreport.php');  
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
      User Details
    </div>
	 <div class="row w3-res-tb">
	 <div class="col-sm-10"></div>
	  <button type='submit' name="btnreport" class="btn btn-primary" value="Report">Export</button>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Register Date</th>
			<th>User Name</th>
			<th>Password</th>
			<th>User Type</th>
			<th>Contact No</th>
			<th>Emailid</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select * from register"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['regdate']."</td>");
			echo("<th>".$rw['username']."</th>");
			echo("<td>".$rw['password']."</td>");
			echo("<td>".$rw['usertype']."</td>");
			echo("<td>".$rw['contactno']."</td>");
			echo("<td>".$rw['emailid']."</td>");
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");
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
</section>
</div>
  </form>
    <?php include("jslink.php") ?>
</body>
</html>