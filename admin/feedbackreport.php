 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



   <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Feedback ID</th>
			<th>Feedback Date</th>
			<th>Feedback</th>
			<th>Rating</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
        $query="select feedbackid,feeddate,rv.regid,feedback,rating from feedback rv,register r where rv.regid=r.regid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['feedbackid']."</td>");
			echo("<td>".$rw['feeddate']."</td>");
			echo("<td>".$rw['feedback']."</td>");
			echo("<td>".$rw['rating']."</td>");
			echo("</tr>");
				$count++;
			}
			echo("</tbody>");
			echo("<tr>");
			echo("<td>Total : ".$count."</td>");
			echo("</tr>");
		 header('Content-Type:application/xls');
				header('Content-Disposition:attachment;filename=report.xls');
		 ?>
        </tbody>
      </table>