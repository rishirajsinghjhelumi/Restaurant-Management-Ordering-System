<html>
<title> Menu </title>
<h1 style="text-align:center"> Menu </h1>
<style type="text/css">
div.div1
{
	text-align:center;
	font-weight: bold;
}
</style>
<?php
	function print_menu()
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "Select * from MENU";
		$menu = mysql_query($query);
		$num_items = mysql_num_rows($menu);
		$num_fields = mysql_num_fields($menu);
		if(!$num_items)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Items In Menu !!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
			return;
		}
		echo "<tr>\n";
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<td>\n";
			echo mysql_field_name($menu,$i);
			echo "</td>\n";
		}
		echo "</tr>\n";
		for($i=0;$i<$num_items;$i++)
		{
			echo "<tr>\n";
			for($j=0;$j<$num_fields;$j++)
			{
				echo "<td>\n";
				echo mysql_result($menu,$i,$j)." "."\n";
				echo "</td>\n";
			}
			echo "</tr>\n";
		}
	}
?>
<body background="1.png">
<table border="2" style="text-align:center;" align="center" width="700">
<?php
	print_menu();
?>
</table>
</body>
</html>
