 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



   <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Review ID</th>
			<th>Review Date</th>
			<th>User Name</th>
			<th>Review</th>
			<th>Rating</th>
			<th>Property Name</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		$query="select reviewid,reviewdate,review,rating,username,propname from review rv,register r,property p where rv.regid=r.regid and rv.propid=p.propid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['reviewid']."</td>");
			echo("<td>".$rw['reviewdate']."</td>");
			echo("<td>".$rw['username']."</td>");
			echo("<td>".$rw['review']."</td>");
			echo("<td>".$rw['rating']."</td>");
			echo("<td>".$rw['propname']."</td>");
			echo("</tr>");
				$count++;
			}
			echo("</tbody>");
			echo("<tr>");
			
			echo("<td>Total :  ".$count."</td>");
			
			echo("</tr>");
		 header('Content-Type:application/xls');
				header('Content-Disposition:attachment;filename=report.xls');
		 ?>
        </tbody>
      </table>
		 