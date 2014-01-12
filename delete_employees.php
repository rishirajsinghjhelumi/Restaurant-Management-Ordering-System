<html>
<title>Delete Employees</title>
<h1 style="text-align:center"> Delete Employees </h1><br/><br/>
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
	function delete_emp($emp_type,$id)
	{
		$num_users = count($id);
		$id_type = $emp_type."_Id";
		for($i=0;$i<$num_users;$i++)
		{
			$query = "DELETE FROM $emp_type WHERE $id_type = $id[$i];";
			mysql_query($query);
		}
		return $num_users;
	}
	function delete_employees($manager_id,$cook_id,$waiter_id,$delivery_boy_id,$cashier_id)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		$count_deleted = 0;
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(!empty($manager_id))
			$count_deleted += delete_emp("MANAGER",$manager_id);
		if(!empty($cashier_id))
			$count_deleted += delete_emp("CASHIER",$cashier_id);
		if(!empty($cook_id))
			$count_deleted += delete_emp("COOK",$cook_id);
		if(!empty($waiter_id))
			$count_deleted += delete_emp("WAITER",$waiter_id);
		if(!empty($delivery_boy_id))
			$count_deleted += delete_emp("DELIVERY_BOY",$delivery_boy_id);
		echo "<script type=\"text/javascript\">"."\n";
		if($count_deleted)
			echo "alert(\"Selected Employees Deleted!!!\");"."\n";
		else
			echo "alert(\"No Employees Selected!!!\");"."\n";
		echo "</script>"."\n";
		echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
	}
	delete_employees(
		$_POST["MANAGER"],
		$_POST["COOK"],
		$_POST["WAITER"],
		$_POST["DELIVERY_BOY"],
		$_POST["CASHIER"]);
?>
</html>
</body>
</html>
