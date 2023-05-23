 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



  <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Group ID</th>
			<th>Group Name</th>
			<th>Short Name</th>
			<th>UPDATE</th>
			<th>DELETE</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="SELECT * FROM `group` WHERE 1"; 
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['groupid']."</td>");
			echo("<td>".$rw['groupname']."</td>");
			echo("<td>".$rw['shortname']."</td>");
			echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['groupid']."'>UPDATE</button></td>");
			echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['groupid']."'>DELETE</button></td>");
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
