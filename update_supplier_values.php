<html>
<title>Update Menu</title>
<?php
	function update_menu_values($fname,$lname,$address,$contact,$details)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "UPDATE `SUPPLIER` SET `Contact`=\"$contact\" ,`Address`=\"$address\", 
			`Details`=\"$details\" WHERE Fname=\"$fname\" and Lname=\"$lname\";";
		mysql_query($query);
	}
	update_menu_values(
		$_POST["Fname"],
		$_POST["Lname"],
		$_POST["Address"],
		$_POST["Contact"],
		$_POST["Details"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("Supplier Updated !!!");
	}
</script>
<body  onload="done()"background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
