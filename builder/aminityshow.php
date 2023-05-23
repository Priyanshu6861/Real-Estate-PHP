<html>
<title>Aminitys</title>
  <head>
    <?php 
	  include('csslink.php');  
	  include('../class/DataClass.php');  
	?>
	
	<?php 
	  $dc=new DataClass();
	?>
	 <?php
     if(isset($_POST['btndelete']))
	 {
	   $aminityid=$_POST['btndelete'];
	   $query="delete from aminity where aminityid='$aminityid'";
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
		header('location:propertyshow.php');   
	  }
   ?>
  </head>
  <body>
  
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
	  <?php include('header.php');  ?>
	  <?php include('menu.php');  ?>
	
	 <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Aminity</span></p>
            <h1 class="mb-3 bread">Aminity Images</h1>
          </div>
        </div>
      </div>
    </div>
	
	 
	 <section class="ftco-section contact-section bg-light">
    <div class="container" >
	<div class="info bg-white p-4">
	 <div class="row">
	    <div class="col-md-2">
		<button type='submit' class='btn btn-primary' name='btnnew' value='NEW' style="padding:10px 40px 10px 40px; margin:20px"> New</button>
		</div>
	      
	    <table class="table table-hover" style="text-align:center">
    <thead class="active">
      <tr>
        <th>Aminity Name</th>
		<th>Filename</th>
        <th>Property Name</th>
        <th>Delete</th>
      </tr>
    </thead>

    <tbody>
      <?php 
		$query="select aminityid,aminityname,a.description,a.filename,propname from aminity a,property p where a.propid=p.propid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['aminityname']."</td>");
			echo("<td>".$rw['filename']."</td>");
			echo("<td>".$rw['propname']."</td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['aminityid']."'>DELETE</button></td>");
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
	  </div>
		</div>
		</div>
	  </div>
	</section>
     <?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>