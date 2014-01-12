<html>
<title> View Users </title>
<style type="text/css">
label{
float: left;
width: 300px;
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
<script type="text/javascript" src="check_form_validate.js"></script>

<h1 style="text-align:center"> Users </h1><br/>
<?php
	function print_users()
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "Select * from USER";
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
		echo "<form name = \"form1\" action=\"update_user.php\" method=\"post\" align=\"center\" onsubmit=\"return checkscript()\">"."\n";
		echo "<table border=\"2\" style=\"text-align:center;\" align=\"center\" width=\"700\">"."\n";
		echo "<tr>"."\n";
		for($i=0;$i<$num_fields-1;$i++)
		{
			echo "<td>"."\n";
			echo mysql_field_name($users,$i);
			echo "</td>"."\n";
		}
		echo "<td>"."\n";
		echo "Select To Update"."\n";
		echo "</td>"."\n";
		echo "</tr>"."\n";
		for($i=0;$i<$num_items;$i++)
		{
			echo "<tr>"."\n";
			for($j=0;$j<$num_fields-1;$j++)
			{
				echo "<td>"."\n";
				echo mysql_result($users,$i,$j)." "."\n";
				echo "</td>"."\n";
			}
			$id = mysql_result($users,$i,0);
			echo "<td>"."\n";
			echo "<input type=\"radio\" name=\"user\" value=\"$id\"><br/>"."\n";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."\n"."<br/>"."\n";
		echo "<input type=\"submit\" value=\"Select\">"."\n";
		echo "</form>"."\n";
	}
?>
<body background="1.png">
<?php
	print_users();
?>
</body>
</html>
