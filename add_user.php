<html>
<title>ADD USER</title>
<?php
	function add_user($firstname,$lastname,$password)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$values = "\"".$firstname."\",\"".$lastname."\",\"".$password."\"";
		$query = "INSERT INTO USER(`Fname`,`Lname`,`Password`) values(".$values.");";
		mysql_query($query);
	}
	add_user(
		$_POST["firstname"],
		$_POST["lastname"],
		$_POST["pass1"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("New User Added!!!");
	}
</script>
<body onload="done()" background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</html>
</body>
</html>
