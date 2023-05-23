 <?php 
     include("../class/DataClass.php");
     $dc=new DataClass();
   ?>



   <table class="table table-striped b-t b-light">
        <thead>
          <tr>
			<th>Category Name</th>
			<th>Short Name</th>
			<th>UPDATE</th>
			<th>DELETE</th>
         </tr>
        </thead>
        <tbody>
		 <?php 
		 $query="SELECT * FROM category WHERE 1"; 
		$tb=$dc->getTable($query);
		$count=0;

		while($rw=mysqli_fetch_array($tb))
		{
			echo("<tr>");
			echo("<td>".$rw['catname']."</td>");
			echo("<td>".$rw['shortname']."</td>");
			
			echo("</tr>");
				$count++;
			}
			echo("<tr>");
			echo("<td>Total :  ".$count."</td>");
			echo("<td></td>");
			echo("<td></td>");
			echo("<td></td>");
			echo("</tr>");
			
			header('Content-Type:application/xls');
			header('Content-Disposition:attachment;filename=report.xls');
		 ?>
        </tbody>
      </table>
