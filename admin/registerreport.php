 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



 <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Register Date</th>
			<th>User Name</th>
			<th>Password</th>
			<th>User Type</th>
			<th>Contact No</th>
			<th>Emailid</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="select * from register"; 
		$tb=$dc->getTable($query);
		$count=0;
		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['regdate']."</td>");
			echo("<td>".$rw['username']."</td>");
			echo("<td>".$rw['password']."</td>");
			echo("<td>".$rw['usertype']."</td>");
			echo("<td>".$rw['contactno']."</td>");
			echo("<td>".$rw['emailid']."</td>");
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