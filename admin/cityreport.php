 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



  <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>CITY ID</th>
			<th>CITY NAME</th>
			<th>SHORT NAME</th>
			<th>PINCODE</th>
			<th>STATE</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select cityid,cityname,c.shortname,pincode,statename from city c,state s where c.stateid=s.stateid"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['cityid']."</td>");
			echo("<td>".$rw['cityname']."</td>");
			echo("<td>".$rw['shortname']."</td>");
			echo("<td>".$rw['pincode']."</td>");
			echo("<td>".$rw['statename']."</td>");
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");
			echo("<td></td>");
			echo("</tr>");
			header('Content-Type:application/xls');
				header('Content-Disposition:attachment;filename=report.xls');
		 ?>
        </tbody>
      </table>
