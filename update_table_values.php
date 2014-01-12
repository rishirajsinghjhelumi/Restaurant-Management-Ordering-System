<html>
<title>Update Table</title>
<?php
	function update_table_values($table_num,$details)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "UPDATE `TABLES` SET `Details`=\"$details\" WHERE Table_Number=$table_num;";
		mysql_query($query);
	}
	update_table_values(
		$_POST["Table_Number"],
		$_POST["Details"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("Table Updated !!!");
	}
</script>
<body  onload="done()"background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
