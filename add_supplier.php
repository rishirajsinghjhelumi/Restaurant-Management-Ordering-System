<html>
<title> Add Supplier </title>
<?php
	function add_supplier($fname,$lname,$address,$contact,$details)
	{
	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$items = "\"".$fname."\",\"".$lname."\",\"".$address."\",\"".$contact."\",\"".$details."\"";
		$query = "insert into `SUPPLIER`(`Fname`,`Lname`,`Address`,`Contact`,`Details`)values (".$items.");";
		$result = mysql_query($query);
	}
	add_supplier(
			$_POST["Fname"],
			$_POST["Lname"],
			$_POST["Address"],
			$_POST["Contact"],
			$_POST["Details"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("New Supplier Added!!!");
	}
</script>
<body onload="done()" background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</body>
</html>
