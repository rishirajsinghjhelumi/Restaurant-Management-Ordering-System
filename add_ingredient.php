<html>
<title> ADD MENU ITEMS </title>
<?php
	function add_ingredient($name,$quantity,$desc,$supp_name)
	{
	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$items = "\"".$name."\",\"".$quantity."\",\"".$desc."\",\"".$supp_name."\"";
		$query = "insert into `INGREDIENT`(`Name`,`Quantity`,`Description`,`Supp_Name`)values (".$items.");";
		$result = mysql_query($query);
	}
	add_ingredient(
			$_POST["Name"],
			$_POST["Quantity"],
			$_POST["Description"],
			$_POST["Supplier_name"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("New Ingredient Added!!!");
	}
</script>
<body onload="done()" background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</body>
</html>
