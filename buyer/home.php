<html>
<head>

    <?php include('csslink.php') ?>
	<?php
	session_start();
    include("../class/DataClass.php");
	$dc=new DataClass();
	include('csslink.php');
	
	   if(isset($_POST['btnviewmore']))
	  {
		header('location:propertyshow.php');
	  }

	?>
</head>
<body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
        <?php include('header.php') ?>
        <?php include('menu.php') ?>
        <?php include('slider.php') ?>
        <?php include('contant1.php') ?>
		
		<div class="container">
		 <div class="form-group">
			<button type="submit" class="btn btn-primary py-3 px-5" name="btnviewmore" value="Search" style="margin:20px 10px 10px 900px"><span class="icon-list-alt"> See All</button>
				</div>
    		<div class="row">
			
				<?php
				 
		    $query="select propid,propname,price,cityname,filename from property p,city c where p.cityid=c.cityid LIMIT 4";
			$tb=$dc->getTable($query);
			
			
			while($rw=mysqli_fetch_array($tb))
			{
			  echo("<div class='col-md-3'>"); 	
			  echo("<table class='table table-hover'>");
			  
			    echo("<tr><td><a href='../builder/propimage/".$rw['filename']."' target='_blank'><img src=../builder/propimage/".$rw['filename']." width='100%' height='100%' class=img-responsive' alt='Responsive image'
             width='307' height='240'></td></tr>");
	            echo("<tr><th>Property Name : ".$rw['propname']."</th></tr>");
				echo("<tr><td>City : ".$rw['cityname']."</td></tr>");
				echo("<tr><th>Price : ".$rw['price']."</th></tr>");
                				
			  echo("</table>");
			  echo("</div>");
			}
		  ?>
	   </div>
      </div>
	  
	   <section class="ftco-section bg-light">
    	<div class="container">
		
		 <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Read Articles</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
    		<div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Celebrity news: Any there any celebrities who’ve recently sold or bought in the area or have properties listed?</a></h3>
               
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Luxury properties: Create a list of top-end properties for sale in your local market. Let your readers know you will be happy to show them.</a></h3>
               
              </div>
            </div>
          </div>
         <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_4.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Crime: What are the local crime rates? Have they gone down or up? What are the safer neighborhoods?</a></h3>
               
              </div>
            </div>
          </div>
		   <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_5.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Job opportunities: Are there new companies or factories in your area? Are there good job opportunities?</a></h3>
               
              </div>
            </div>
          </div>
		   <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_6.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Property taxes: What can buyers expect in specific neighborhoods?</a></h3>
               
              </div>
            </div>
          </div>
		   <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_7.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Best value properties: Provide a list of properties you think are the best values.</a></h3>
               
              </div>
            </div>
          </div> <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_8.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Affordable properties: Create a list of the lowest priced properties in your local market.</a></h3>
               
              </div>
            </div>
          </div>
		   <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">Are home sales up or down? Is this a buyer’s or seller’s market? How do mortgage rates affect local buying?</a></h3>
               
              </div>
            </div>
          </div>
        </div>
		</div>
		
	</section>
		

        <?php include('footer.php') ?>
        <?php include('jslink.php') ?>
</div>
</form>
</body>

</html>
