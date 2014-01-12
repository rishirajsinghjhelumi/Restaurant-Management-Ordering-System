<html>
<title>Update User</title>
<?php
	function update_user_values($user_id,$firstname,$lastname,$password)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "UPDATE `USER` SET `Fname`=\"$firstname\" ,`Lname`=\"$lastname\", `Password`=\"$password\" WHERE User_Id=$user_id;";
		mysql_query($query);
	}
	update_user_values(
		intval($_POST["User_Id"]),
		$_POST["Fname"],
		$_POST["Lname"],
		$_POST["Password"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("User Updated !!!");
	}
</script>
<body  onload="done()"background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
