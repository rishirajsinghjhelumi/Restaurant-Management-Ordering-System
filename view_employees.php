<html>
<title> Delete Employees </title>
<style type="text/css">
label{
float: left;
width: 700px;
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

<h1 style="text-align:center"> Delete Employees </h1>
<?php
	function print_employee($employee_type)
	{
		$query = "Select * from $employee_type";
		$emp = mysql_query($query);
		$num_items = mysql_num_rows($emp);
		$num_fields = mysql_num_fields($emp);
		if(!$num_items)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No $employee_type Added!!!\");"."\n";
			echo "</script>"."\n";
			return;
		}
		echo "<table border=\"2\" style=\"text-align:center;\" align=\"center\" width=\"1200\">"."\n";
		echo "<tr>"."\n";
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<td>"."\n";
			echo mysql_field_name($emp,$i);
			echo "</td>"."\n";
		}
		echo "<td>"."\n";
		echo "Select To Delete"."\n";
		echo "</td>"."\n";
		echo "</tr>"."\n";
		for($i=0;$i<$num_items;$i++)
		{
			echo "<tr>"."\n";
			echo "<label for = \"$employee_type\">";
			for($j=0;$j<$num_fields;$j++)
			{
				echo "<td>"."\n";
				echo mysql_result($emp,$i,$j)." "."\n";
				echo "</td>"."\n";
			}
			$id = mysql_result($emp,$i,0);
			echo "</label>"."\n";
			echo "<td>"."\n";
			$type = $employee_type."[]";
			echo "<input type=\"checkbox\" name=\"$type\" value=\"$id\"><br/>"."\n";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."\n";
		echo "<br/>\n";
		return $num_items;
	}
	function print_users()
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$num_emp = 0;
		echo "<form action=\"delete_employees.php\" method=\"post\" align=\"center\">"."\n";
		echo "<h1 style=\"text-align:center\"> Managers </h1>"."\n";
		$num_emp += print_employee("MANAGER");
		echo "<h1 style=\"text-align:center\"> Cooks </h1>"."\n";
		$num_emp += print_employee("COOK");
		echo "<h1 style=\"text-align:center\"> Cashiers </h1>"."\n";
		$num_emp += print_employee("CASHIER");
		echo "<h1 style=\"text-align:center\"> Waiters </h1>"."\n";
		$num_emp += print_employee("WAITER");
		echo "<h1 style=\"text-align:center\"> Delivery Boys </h1>"."\n";
		$num_emp += print_employee("DELIVERY_BOY");
		if(!$num_emp)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Employees Added!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">";
			return;
		}
		echo "<input type=\"submit\" value=\"Delete Selected Employees\">"."\n";
	}
?>
<body background="1.png">
<?php
	print_users();
?>
</form>
</body>
</html>
