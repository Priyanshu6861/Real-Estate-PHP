<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<title>Groups</title>
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
	   $groupid=$_POST['btndelete'];
	   $query="delete from `group` where groupid='$groupid'";
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
		header('location:groupform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$groupid=$_POST['btnupdate'];  
		$_SESSION['groupid']=$groupid;
		$_SESSION['trans']="update";   
		header('location:groupform.php');
	  }
	  	 if(isset($_POST['btnreport']))
	  {
		$_SESSION['trans']="";   
		header('location:groupreport.php');  
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
      Group Show
    </div>
    <div class="row w3-res-tb">
     <div class="col-sm-1">
			<button type='submit' class='btn btn-success' name='btnnew' value="">ADD</button>
			</div>
			<div class="col-sm-10"></div>
     <button type='submit' name="btnreport" class="btn btn-primary" value="Report">Export</a>
			<div class="col-sm-8">
			</div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Group ID</th>
			<th>Group Name</th>
			<th>Short Name</th>
			<th>UPDATE</th>
			<th>DELETE</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="SELECT * FROM `group` WHERE 1"; 
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['groupid']."</td>");
			echo("<td>".$rw['groupname']."</td>");
			echo("<td>".$rw['shortname']."</td>");
			echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['groupid']."'>UPDATE</button></td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['groupid']."'>DELETE</button></td>");
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");
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