<html>
<title>Update User</title>
<?php
	function update_owner_values($firstname,$lastname,$contact,$rest_name)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "UPDATE `OWNER` SET `Fname`=\"$firstname\" ,`Lname`=\"$lastname\", 
			`Contact`=\"$contact\" where `Rest_Name`=\"$rest_name\";";
		mysql_query($query);
	}
	update_owner_values(
		$_POST["Fname"],
		$_POST["Lname"],
		$_POST["Contact"],
		$_POST["Rest_Name"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("Owner Updated !!!");
	}
</script>
<body  onload="done()" background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
