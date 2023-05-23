<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<title>Gallery</title>
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
	   $imgid=$_POST['btndelete'];
	   $query="delete from gallery where imgid='$imgid'";
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
		header('location:galleryform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$imgid=$_POST['btnupdate'];  
		$_SESSION['imgid']=$imgid;
		$_SESSION['trans']="update";   
		header('location:galleryform.php');
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
      Gallery Show
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
            <th>Image ID</th>
			<th>Image Date</th>
			<th>Title</th>
			<th>Image Type</th>
			<th>Image Size</th>
			<th>UPDATE</th>
			<th>DELETE</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select * from gallery"; 
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['imgid']."</td>");
			echo("<td>".$rw['imgdate']."</td>");
			echo("<td>".$rw['title']."</td>");
			echo("<td>".$rw['imgtype']."</td>");
			echo("<td>".$rw['imgsize']."</td>");
			echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['imgid']."'>UPDATE</button></td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['imgid']."'>DELETE</button></td>");
			echo("</tr>");
				$count++;
			}
			echo("</tbody>");
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");
			echo("<td></td>");
			echo("</tr>");
			if($count==0)
			{
			   $msg="Record not found..";
			}
		 ?>
     
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