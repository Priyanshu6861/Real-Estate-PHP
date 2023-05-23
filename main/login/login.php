<!DOCTYPE html>
<html>
<head>
<title> Login </title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <?php
    session_start();
	include('../../class/dataclass.php');
	?>
	
	<?php
	  $regid="";
	  $username="";
	  $password="";
	  $msg1="";
	  $msg2="";
	  $dc=new DataClass();
	?>
	
	<?php
	  if(isset($_SESSION['regid']))
	  {
	    $regid=$_SESSION['regid']; 
	    $username=$_SESSION['username'];
	  }
	  
	  if(isset($_POST['btnlogin']))
      {
		$username=$_POST['txtusername']; 
		$password=$_POST['txtpassword'];  
		$query="select regid,username,password,usertype,emailid from register where username='$username'";
	    $rw=$dc->getRecord($query);
		if($rw)
		{
		  if($password==$rw['password'])
		  { 
			$_SESSION['regid']=$rw['regid'];	
		    $_SESSION['username']=$username;
            $_SESSION['emailid']=$rw['emailid'];			
			if($rw['usertype']=="Admin")
			{
			  header("location:../../admin/home.php");
			}
			if($rw['usertype']=="Seller")
			{
			  header("location:../../builder/home.php");
			}				
			if($rw['usertype']=="Buyer")
			{
			  header("location:../../buyer/home.php");
			}	
		  }
		  else
		  {
		   $msg1="Invalid Password";
		  }
		}
		else
		{
		  $msg2="Invalid User Name";
		}
	  }
	  if(isset($_POST['btncancel']))
			{
				header('location:../home.php');
			}
	
	?>
	
		 <script>
		function checksubmit()
		{
			if(sname.innerHTML!="" || sn.innerHTML!="")
			{
				msg.innerHTML="Form is not valid";
				return false;
			}
			else
			{
				return true;
			}
		}
	</script>
	<style type="text/css">
		.icon1{
			margin:10px!important;
			padding:10px!important;
			border-radius: 20px;
		}
	</style>

</head>
<body>
<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1>login here</h1>
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-user-circle-o"></span>
			</div>
			<div class="header-left-bottom">
				<form action="#" method="post">
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" name="txtusername" placeholder="Username" required="" style="width:87%;border-radius: 8px;margin 20px;border: 2px solid #007cc0;font-family: 'Poiret One', cursive;"/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" name="txtpassword" placeholder="Password" required="" style="width:87%;border-radius: 8px; border: 2px solid #007cc0;font-family: 'Poiret One', cursive;"/>
					</div>
					
					<div class="bottom">
						<button type="submit" name="btnlogin" class="btn btn-primary" style="border-radius: 30px;">LOGIN</button>
						<button type="submit" href="" name="btncancel" formnovalidate class="btn btn-danger " style="background: #fd3434;border-radius: 30px;margin:10px 1px 1px 1px">CANCEL</button>
						 <span name="lblmsg" style="color:white;padding:10px 10px 0px 10px"> <?php echo($msg1) ?></span>
						 <span name="lblmsg" style="color:white;padding:10px 10px 0px 10px"> <?php echo($msg2) ?></span>
					</div>
					<div class="links">
						<p><a href="#"></a></p>
						<p class="right"><a href="../register/register.php">New User? Register</a></p>
						<div class="clear"></div>
					</div>
				</form>	
			</div>
			<div class="social">
				<ul>
					<li>or login using : </li>
					<li><a href="https://www.facebook.com/" class="facebook"><span class="fa fa-facebook"></span></a></li>
					<li><a href="https://twitter.com/" class="twitter"><span class="fa fa-twitter"></span></a></li>
					<li><a href="https://www.google.com/" class="google"><span class="fa fa-google-plus"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</body>
</html>