<html>
<title>Delete Users</title>
<h1 style="text-align:center"> Delete Users </h1><br/><br/>
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
<?php
	function view_users()
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "SELECT * from USER;";
		$users = mysql_query($query);
		$num_items = mysql_num_rows($users);
		$num_fields = mysql_num_fields($users);
		if(!$num_items)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Users !!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
			return;
		}
		echo "<form action=\"delete_user_list.php\" method=\"post\" align=\"center\">"."\n";
		echo "<table border=\"2\" style=\"text-align:center;\" align=\"center\" width=\"700\">"."\n";
		echo "<tr>"."\n";
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<td>"."\n";
			echo mysql_field_name($users,$i);
			echo "</td>"."\n";
		}
		echo "<td>"."\n";
		echo "Select To Delete"."\n";
		echo "</td>"."\n";
		echo "</tr>"."\n";
		for($i=0;$i<$num_items;$i++)
		{
			echo "<tr>"."\n";
			for($j=0;$j<$num_fields;$j++)
			{
				echo "<td>"."\n";
				echo mysql_result($users,$i,$j)." "."\n";
				echo "</td>"."\n";
			}
			$id = mysql_result($users,$i,0);
			echo "<td>"."\n";
			echo "<input type=\"checkbox\" name=\"user[]\" value=\"$id\"><br/>"."\n";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."<br/>\n";
		echo "<input type=\"submit\" value=\"Delete Users\">"."\n";
		echo "</form>"."\n";
	}
?>
</script>
<body  background = "1.png">
<?php
	view_users();
?>
</html>
</body>
</html>
