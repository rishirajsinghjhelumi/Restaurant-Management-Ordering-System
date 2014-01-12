<html>
<title>Update Ingredient</title>
<?php
	function update_ingredient_values($ing_id,$name,$quantity,$desc,$supp_name)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "UPDATE `INGREDIENT` SET `Name`=\"$name\" ,`Quantity`=\"$quantity\", 
			`Description`=\"$desc\" , `Supp_Name`= \"$supp_name\" WHERE Ingredient_Id=$ing_id;";
		mysql_query($query);
	}
	update_ingredient_values(
		intval($_POST["Ingredient_Id"]),
		$_POST["Name"],
		$_POST["Quantity"],
		$_POST["Description"],
		$_POST["Supp_Name"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("Ingredient Updated !!!");
	}
</script>
<body  onload="done()"background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
