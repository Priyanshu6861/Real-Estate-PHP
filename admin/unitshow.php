<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Unit</title>
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
	   $unitid=$_POST['btndelete'];
	   $query="delete from unit where unitid='$unitid'";
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
		header('location:unitform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$unitid=$_POST['btnupdate'];  
		$_SESSION['unitid']=$unitid;
		$_SESSION['trans']="update";   
		header('location:unitform.php');
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
      Unit Show
    </div>
    <div class="row w3-res-tb">
     <div class="col-sm-1">
			<button type='submit' class='btn btn-success' name='btnnew' value="">ADD</button>
			</div>
			<div class="col-sm-8">
			</div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Unit ID</th>
			<th>Unit Name</th>
			<th>Square Feet</th>
			<th>Square Meter</th>
			<th>UPDATE</th>
			<th>DELETE</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select * from unit"; 
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['unitid']."</td>");
			echo("<td>".$rw['unitname']."</td>");
			echo("<td>".$rw['squarefeet']."</td>");
			echo("<td>".$rw['squaremeter']."</td>");
			echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['unitid']."'>UPDATE</button></td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['unitid']."'>DELETE</button></td>");
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total : ".$count."</td>");
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