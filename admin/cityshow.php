<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<title>City</title>
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
			
	   $cityid=$_POST['btndelete'];
	   $query="delete from city where cityid='$cityid'";
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
		header('location:cityform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$cityid=$_POST['btnupdate'];  
		$_SESSION['cityid']=$cityid;
		$_SESSION['trans']="update";   
		header('location:cityform.php');
	  }
	   if(isset($_POST['btnreport']))
	  {
		$_SESSION['trans']="";   
		header('location:cityreport.php');  
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
      City Show
    </div>
    <div class="row w3-res-tb">
     <div class="col-sm-1">
			<button type='submit' class='btn btn-success' name='btnnew' value="">ADD</button>
			</div>
			<div class="col-sm-9">
			</div>
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
            <th>CITY ID</th>
			<th>CITY NAME</th>
			<th>SHORT NAME</th>
			<th>PINCODE</th>
			<th>STATE</th>
			<th>UPDATE</th>
			<th>DELETE</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select cityid,cityname,c.shortname,pincode,statename from city c,state s where c.stateid=s.stateid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['cityid']."</td>");
			echo("<td>".$rw['cityname']."</td>");
			echo("<td>".$rw['shortname']."</td>");
			echo("<td>".$rw['pincode']."</td>");
			echo("<td>".$rw['statename']."</td>");
			echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['cityid']."'>UPDATE</button></td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btndelete' data-toggle='modal' data-target='#myModal' value='".$rw['cityid']."'>DELETE</button></td>");
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
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  </div>
</div>
</section>
</section>
</div>
  </form>
    <?php include("jslink.php") ?>
</body>
</html>