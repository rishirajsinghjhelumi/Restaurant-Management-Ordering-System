<html>
<title>Delete Tables</title>
<h1 style="text-align:center"> Delete Tables </h1><br/><br/>
<style type="text/css">
label{
float: left;
width: 120px;
       font-weight: bold;
}
input, textarea{
width: 200px;
       margin-bottom: 9px;
}
br{
clear: left;
}
</style>
<body background = "1.png">
<?php
	function delete_table($table)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(empty($table))
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Tables Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
		else
		{
			$num_table = count($table);
			for($i=0;$i<$num_table;$i++)
			{
				$query = "DELETE FROM TABLES WHERE Table_Number = $table[$i];";
				mysql_query($query);
			}
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"Selected Tables Deleted!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
	}
	delete_table(
		$_POST["table"]);
?>
</html>
</body>
</html>
