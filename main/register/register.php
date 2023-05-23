<html>
<head>
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<script src="../../validation.js"></script>
 
	<?php
	session_start();
	include('../../class/dataclass.php');
	?>

	<?php
		$regid="";
		$regdate="";
		$username="";
		$password="";
		$usertype="";
		$contactno="";
		$emailid="";
		$msg="";
		$dc=new DataClass();
	?>

		<?php

			if(isset($_POST['btnregister']))
			{
				echo("test");
				$regid=$dc->primary("select max(regid) from register");
				$regdate=date('y-m-d');
				$username=$_POST['txtusername'];
				$password=$_POST['txtpassword'];
				$usertype=$_POST['lstusertype'];
				$emailid=$_POST['txtemailid'];
				$contactno=$_POST['txtcontactno'];
				$query="insert into register values('$regid','$regdate','$username','$password','$usertype','$contactno','$emailid')";
				echo($query);
				$result=$dc->saveRecord($query);
				if($result)
				{
					$_SESSION['regid']=$regid;
					$_SESSION['username']=$username;
					header('location:../login/login.php');
				}
				else
				{
					$msg="User Not Registered";
				}
			}

			if(isset($_POST['btncancle']))
			{
				$_SESSION['regid']="";
				header('location:../home.php');
			}
			?>
			 <script>
		function checksubmit()
		{
			if(usnm.innerHTML!="" || pas.innerHTML!="" || cpas.innerHTML!="" || eml.innerHTML!="" || conno.innerHTML!="")
			{
				alert("Form is not valid");
				return false;
			}
			else
			{
				return true;
			}
		}
	</script>
</head>
<body>
<div class="signupform">
<h1>Register Here</h1>
	<div class="container">
		
		<div class="agile_info">
			<div class="w3_info">

						<form action="#" method="post">
						<div class="left margin">
							<label>User Name</label>
							<div class="input-group">
							<input type="text" name="txtusername" placeholder="User Name" style=" border-bottom: 2px solid #5900ff;font-family: 'Poiret One', cursive;" onchange="onlyalpha(this,usnm)" required> 
							<span id="usnm"></span>
							</div>
						</div>

						<div class="left">
							<label>Password</label>
							  <div class="input-group">
								<input type="Password" id="pass" name="txtpassword" placeholder="Password" style=" border-bottom: 2px solid #5900ff;font-family: 'Poiret One', cursive;" onchange="checklength(this,pas,5,10)" required>
								<span id="pas"></span>
							 </div>
						</div>

						<div class="left margin">
							<label>user type</label>
							<div class="input-group">
								<select name="lstusertype"  type="dropdown" required="" style="width: 87%;background-color: rgb(240, 231, 231);padding: 10px 10px 10px 10px;border-bottom: 2px solid #5900ff;font-family: 'Poiret One', cursive;">
									<option>Buyer</option>
									<option>Seller</option>
								</select>
							</div>
						</div>

						<div class="left">
							<label>Confirm Password</label>
							<div class="input-group">
							<input type="Password" id="passc" placeholder="Confirm Password" style=" border-bottom: 2px solid #5900ff;font-family: 'Poiret One', cursive;" onchange="confirmpassword(this,pass,cpas)" required>
							<span id="cpas"></span>
							</div>
						</div>
						
						<div class="left margin">
							<label>Email Address</label>
							<div class="input-group">
							<input type="email" name="txtemailid" placeholder="Email" style=" border-bottom: 2px solid #5900ff;font-family: 'Poiret One', cursive;" onchange="checkemail(this,eml)" required> 
							<span id="eml"></span>
							</div>
						</div>

						<div class="left">
							<label>Contact Number</label>
							<div class="input-group">
							<input type="text" name="txtcontactno" placeholder="Contact Number" style=" border-bottom: 2px solid #5900ff;font-family: 'Poiret One', cursive;" onchange="checkmobileno(this,conno)" required>
							</div>
							<span id="conno" ></span>
							
						</div>

						<div class="clear"></div>
							
							<input class="btn btn-danger btn-block" type="submit" name="btnregister" value="Register" onclick="return checksubmit()">
							<input class="btn btn-danger btn-block" formnovalidate type="submit"name="btncancle" value="Cancle"> 
					</form>
			</div>
			<div class="w3l_form">
				<div class="left_grid_info">
					<h3>Already Registered?</h3>
					<p>You've Clicked the Sign-up Button instead of the Sign in to access your existing account.</p>
					<a href="../login/login.php" class="btn">Login </a>
				</div>
			</div>
			<div class="clear"></div>
			</div>
			
		</div>
		
	</div>
	</body>
</html>