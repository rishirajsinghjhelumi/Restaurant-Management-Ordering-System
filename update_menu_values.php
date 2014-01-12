<html>
<title>Update Menu</title>
<?php
	function update_menu_values($menu_id,$name,$price,$type,$category)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "UPDATE `MENU` SET `Name`=\"$name\" ,`Price`=\"$price\", `Type`=\"$type\" , `Category`= \"$category\" WHERE Menu_Id=$menu_id;";
		mysql_query($query);
	}
	update_menu_values(
		intval($_POST["menu_id"]),
		$_POST["Name"],
		$_POST["Price"],
		$_POST["Type"],
		$_POST["Category"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("Menu Updated !!!");
	}
</script>
<body  onload="done()"background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
