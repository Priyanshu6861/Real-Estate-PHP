 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



   <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Message ID</th>
			<th>Message NAME</th>
			<th>Message Date</th>
			<th>Mobile No</th>
			<th>User Name</th>
          </tr>
        </thead>
        <tbody>
		 <?php 
		$query="select msgid,msgdate,msg,mobileno,username from message m,register r where m.regid=r.regid"; 
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['msgid']."</td>");
			echo("<td>".$rw['msgdate']."</td>");
			echo("<td>".$rw['msg']."</td>");
			echo("<td>".$rw['mobileno']."</td>");
			echo("<td>".$rw['username']."</td>");
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
