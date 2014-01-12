<html>
<title>Update Employee</title>
<?php
	function update_emp_values($emp_type,$emp_id,$fname,$lname,$contact,$address,$salary,$sex,$bdate,$join_date)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$emp_type_id = $emp_type."_id";
		$query = "Select * from $emp_type";
		$emp = mysql_query($query);
		$num_fields = mysql_num_fields($emp);
		if($emp_type=="COOK")
			$val_arrays = array("$emp_id",$fname,$lname,$contact,$address,$salary,$sex,$bdate,$join_date,$_POST["Specialization"]);
		else
			$val_arrays = array("$emp_id",$fname,$lname,$contact,$address,$salary,$sex,$bdate,$join_date);
		$values = "";
		for($i=1;$i<$num_fields;$i++)
		{
			$values = $values.mysql_field_name($emp,$i)." = "."\"$val_arrays[$i]\"";
			if($i!=$num_fields-1)
				$values = $values." , ";
		}
		$query = "UPDATE $emp_type SET ".$values ."  WHERE $emp_type_id = $emp_id;";
		mysql_query($query);
	}	
	update_emp_values(
		$_POST["emp_type"],
		$_POST["emp_id"],
		$_POST["Fname"],
		$_POST["Lname"],
		$_POST["Contact"],
		$_POST["Address"],
		$_POST["Salary"],
		$_POST["Sex"],
		$_POST["Bdate"],
		$_POST["Join_Date"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("Employee Updated !!!");
	}
</script>
<body  onload="done()" background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
