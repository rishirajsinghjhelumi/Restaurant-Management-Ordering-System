<html>
<title> Update Owner </title>
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

<h1 style="text-align:center"> Update Owner </h1><br/>
<?php
	function update_owner()
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		echo "<form name = \"form1\" action = \"update_owner_values.php\" method =\"post\" align=\"center\" onsubmit=\"return checkscript()\">"."\n";
		echo "<table style=\"text-align:center;\" align=\"center\" width=\"400\">"."\n";
		$query = "SELECT * from OWNER;";
		$owner = mysql_query($query);
		$num_fields = mysql_num_fields($owner);
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<tr>"."\n";
			echo "<td>"."\n";
			$field = mysql_field_name($owner,$i);
			if($i!=$num_fields-1)
				echo "<b>".$field."</b>"."\n";
			else
				echo "<b>"."Restaurant Name"."</b>"."\n";
			echo "</td>"."\n";
			echo "<td>"."\n";
			$res = mysql_result($owner,0,$i);
			if($i!=$num_fields-1)
				echo "<input type = \"text\" name = \"$field\" value=\"$res\">";
			else
				echo "<input type = \"text\" name = \"$field\" value=\"$res\" readonly=\"readonly\">";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."\n"."<br/>";
		echo "<input type=\"submit\" name=\"submitbutton\" value=\"Update\">"."\n";
		echo "</form>"."\n";
	}

?>
<body background="1.png">
<?php
	update_owner();
?>
</body>
</html>
