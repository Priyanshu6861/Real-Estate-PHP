 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



  <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Advertisement ID</th>
			<th>Advertisement Date</th>
			<th>Image</th>
			<th>Title</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select advid,advdate,a.filename,s.sellerid,p.propid,a.description,title from advertisement a,seller s,property p where a.sellerid=s.sellerid and a.propid=p.propid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['advid']."</td>");
			echo("<td>".$rw['advdate']."</td>");
			echo("<td>".$rw['filename']."</td>");
			echo("<td>".$rw['title']."</td>");
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");
			echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");	
			echo("</tr>");
			
			header('Content-Type:application/xls');
			header('Content-Disposition:attachment;filename=report.xls');
		 
		 ?>
        </tbody>
      </table>