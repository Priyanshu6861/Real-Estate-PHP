 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



  <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>aminity ID</th>
			<th>aminity Name</th>
			<th>Description</th>
			<th>Filename</th>
			<th>Property Name</th>
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
			echo("<td>".$rw['aminityid']."</td>");
			echo("<td>".$rw['aminityname']."</td>");
			echo("<td>".$rw['description']."</td>");
			echo("<td>".$rw['filename']."</td>");
			echo("<td>".$rw['propname']."</td>");
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
