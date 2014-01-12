<html>
<title> ADD EMPLOYEE </title>
<?php
	function add_employee($firstname,$lastname,$contact,$salary,$address,$sex,$bdate,$joindate,$type)
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$values = "\"".$firstname."\",\"".$lastname."\",\"".$contact."\",\"".$address."\",\"".$salary."\",\"".$sex."\",\"".$bdate."\",\"".$joindate."\"";
		$query = "insert into `".$type."`(`Fname`,`Lname`,`Contact`,`Address`,`Salary`,`Sex`,`Bdate`,`Join_Date`) values(".$values.");";
		$result = mysql_query($query);
	}
	add_employee(
			$_POST["firstname"],
			$_POST["lastname"],
			$_POST["contact"],
			$_POST["salary"],
			$_POST["address"],
			$_POST["sex"],
			$_POST["bdate"],
			$_POST["joindate"],
			$_POST["type"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("EMPLOYEE ADDED!!!");
	}
</script>
<body onload="done()" background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</body>
</html>
