<html>
<title> Update Employee </title>
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

<h1 style="text-align:center"> Update Employee </h1><br/><br/>
<?php
	function update_user($employee)
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if($employee=="")
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Employee Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">";
			return;
		}
		list($emp_id,$emp_type) = split(",",$employee,2);
		$emp_id = intval($emp_id);
		$emp_id_type = $emp_type."_id";
		$query = "Select * from $emp_type WHERE $emp_id_type=$emp_id;";
		$emp = mysql_query($query);
		$num_fields = mysql_num_fields($emp);
		echo "<form name = \"form1\" action = \"update_employee_values.php\" method =\"post\" align=\"center\" onsubmit=\"return checkscript()\">"."\n";
		echo "<table style=\"text-align:center;\" align=\"center\" width=\"400\">"."\n";
		echo "<tr>\n";
		echo "<td><b>Employee Type</b></td>\n";
		echo "<td><input type = \"text\" name = \"emp_type\" value=\"$emp_type\" readonly=\"readonly\"></td\n>";
		echo "</tr>\n";
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<tr>"."\n";
			echo "<td>"."\n";
			$field = mysql_field_name($emp,$i);
			echo "<b>".$field."</b>"."\n";
			echo "</td>"."\n";
			echo "<td>"."\n";
			$res = mysql_result($emp,0,$i);
			if($i)
				echo "<input type = \"text\" name = \"$field\" value=\"$res\">";
			else
				echo "<input type = \"text\" name = \"emp_id\" value=\"$res\" readonly=\"readonly\">";
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
	update_user($_POST["employee"]);
?>
</body>
</html>
