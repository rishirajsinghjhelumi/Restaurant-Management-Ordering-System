<html>
<title> Add Tables </title>
<?php
	function add_table($table_num,$details)
	{
	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$check = "SELECT * from `TABLES` WHERE Table_Number=$table_num";
		$result = mysql_query($check);
		$num_items = mysql_num_rows($result);
		if($num_items)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"Table Number Already Exists!!!\");"."\n";
			echo "</script>"."\n";
			return;
		}
		$items = "\"".$table_num."\",\"".$details."\"";
		$query = "insert into `TABLES`(`Table_Number`,`Details`)values (".$items.");";
		$result = mysql_query($query);
		echo "<script type=\"text/javascript\">"."\n";
			echo "alert(\"New Table Added!!!\");"."\n";
		echo "</script>"."\n";
	}
	add_table(
			$_POST["Table_Number"],
			$_POST["Details"]);
?>
</script>
<body background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</body>
</html>
