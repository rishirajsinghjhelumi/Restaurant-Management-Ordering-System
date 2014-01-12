<html>
<title> Check Contact </title>
<?php
	function check_booking_contact($contact)
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if($contact=="")
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Contact Added!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=user.html\">";
			return;
		}
		$query = "SELECT * FROM CUSTOMER where Contact=$contact";
		$cust = mysql_query($query);
		$num_items = mysql_num_rows($cust);
		$cust_id = mysql_result($cust,0,0);
		if($num_items)
		{
			echo"<form id = \"form1\" name=\"form1\" action = \"menu_dine.php\" method =\"post\">";
			echo "<input type = \"text\" name = \"cust_id\" value=\"$cust_id\"></td></tr>";
			echo "<input type=\"submit\" name=\"submitbutton\" value=\"Check\"></td></tr></table>";
			echo "</form>";
			echo "<script type=\"text/javascript\">"."\n";
				echo "document.getElementById(\"form1\").submit();";
			echo "</script>"."\n";
		}
		else
		{
			echo"<form id = \"form1\" name=\"form1\" action = \"add_customer_dine.php\" method =\"post\">";
			echo "<input type = \"text\" name = \"contact\" value=\"$contact\"></td></tr>";
			echo "<input type=\"submit\" name=\"submitbutton\" value=\"Check\"></td></tr></table>";
			echo "</form>";
			echo "<script type=\"text/javascript\">"."\n";
				echo "document.getElementById(\"form1\").submit();";
			echo "</script>"."\n";
		}
	}
?>
<body background="1.png">
<?php
	check_booking_contact($_POST["contact"]);
?>
</body>
</html>
