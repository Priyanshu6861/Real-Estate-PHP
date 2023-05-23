 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



    <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>State ID</th>
			<th>State NAME</th>
			<th>SHORT NAME</th>
			<th>country</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select stateid,statename,c.shortname,countryname from state c,country s where c.countryid=s.countryid"; 
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['stateid']."</td>");
			echo("<td>".$rw['statename']."</td>");
			echo("<td>".$rw['shortname']."</td>");
			echo("<td>".$rw['countryname']."</td>");
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
			echo("</tr>");
			header('Content-Type:application/xls');
				header('Content-Disposition:attachment;filename=report.xls');
		?>
        </tbody>
      </table>