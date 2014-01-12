<html>
<title> Add Customer </title>
<?php
	function add_customer($fname,$lname,$contact,$email_id)
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$items = "\"".$fname."\",\"".$lname."\",\"".$contact."\",\"".$email_id."\"";
		$query = "insert into `CUSTOMER`(`Fname`,`Lname`,`Contact`,`Email_id`)values (".$items.");";
		mysql_query($query);
		$query = "SELECT Customer_Id from CUSTOMER WHERE Contact=$contact";
		$res = mysql_query($query);
		$cust_id = intval(mysql_result($res,0,0));
		echo"<form id = \"form1\" name=\"form1\" action = \"menu_dine.php\" method =\"post\">";
		echo "<input type = \"text\" name = \"cust_id\" value=\"$cust_id\"></td></tr>";
		echo "<input type=\"submit\" name=\"submitbutton\" value=\"Check\"></td></tr></table>";
		echo "</form>";
		echo "<script type=\"text/javascript\">"."\n";
			echo "document.getElementById(\"form1\").submit();";
		echo "</script>"."\n";
	}
	add_customer(
		$_POST["firstname"],
		$_POST["lastname"],
		$_POST["contact"],
		$_POST["email_id"]);
		
?>
<body background="1.png">
</body>
</html>
