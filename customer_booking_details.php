<html>
<head>
<title> Booking </title>
</head>
<body>
<h1 style="text-align:center"> Booking </h1><br/><br/>
<body background = "1.png">
<script type="text/javascript" src="check_form_validate.js"></script>
<form name="form1" action = "add_customer_booking.php" method = "post" onsubmit="return checkscript()">

<table border=2 style=text-align:center; align=center width=500>
<tr><label for = "firstname"><td>First name: </td></label><td><input type = "text" name = "firstname" ></td></tr>
<tr><label for = "lastname"><td>Last name: </td></label><td><input type = "text" name = "lastname"></td></tr>
<?php
	$c = $_POST["contact"];
	echo "<tr><label for = \"contact\"><td>Contact: </td></label><td><input type = \"text\" name = \"contact\" value=\"$c\" readonly=\"readonly\"></td></tr>";
?>
<tr><label for = "email_id"><td>Email Id: </td></label><td><input type = "text" name = "email_id"></td></tr>
<tr><label for = "table_number"><td>Table Number: </td></label>
<td>
<?php
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "SELECT Table_Number FROM TABLES;";
		$table = mysql_query($query);
		$num_tables = mysql_num_rows($table);
		echo "<select name = \"table_number\" style=\"width: 200px;\">";
		for($i=0;$i<$num_tables;$i++)
		{
			$val = mysql_result($table,$i,0);
			echo "<option value=\"$val\">$val</option>";
		}
		echo "</select>";
?>
</td></tr>
<tr><label for = "date"><td>Date: </td></label><td><input type = "text" name = "date"></td></tr>
<tr><label for = "time"><td>Time: </td></label><td><input type = "text" name = "time"></td></tr>
</table><br/>
<table border=0 style=text-align:center; align=center><tr><td><input type="submit" name="submitbutton" value="Book"></td></tr></table>

</form>

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
</body>
</html>
