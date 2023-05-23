<?php 

 if(isset($_SESSION['username']))
   {
      $username=$_SESSION['username'];
   }
   
    if(isset($_POST["btnlogout"]))
	{
	  session_destroy();
	  header('location:../main/home.php');
	}
	
 ?>
 
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="home.php" class="logo">
       <i class="fa fa-home"></i> ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
	
</div>

<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="padding:10px 10px 10px 10px">
                <i class="fa fa-user" style="color:white"> <?php echo($username)?> </i>
                <span class="username"></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="profileshow.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="profileupdate.php"><i class="fa fa-cog"></i>Edit Profile </a></li>
                <li><a href="../main/home.php"><i class="fa fa-key" name="btnlogout"></i>Log Out</a></li>
            </ul>
        </li>
    </ul>
</div>
</header>
