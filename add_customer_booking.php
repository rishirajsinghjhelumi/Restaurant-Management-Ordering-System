<html>
<title> Add Customer Booking</title>
<?php
	function add_customer_booking($fname,$lname,$contact,$email_id,$table_num,$date,$time)
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "SELECT * from CUSTOMER WHERE Contact=$contact;";
		$res = mysql_query($query);
		$check = mysql_num_rows($res);
		if(!$check)
		{
			$items = "\"".$fname."\",\"".$lname."\",\"".$contact."\",\"".$email_id."\"";
			$query = "insert into `CUSTOMER`(`Fname`,`Lname`,`Contact`,`Email_Id`)values (".$items.");";
			mysql_query($query);
		}
		$query = "SELECT Customer_Id FROM CUSTOMER where Contact=$contact";
		$cust = mysql_query($query);
		$cust_id = mysql_result($cust,0,0);
		$cust_id = intval($cust_id);
		$items = "\"".$table_num."\",\"".$date."\",\"".$time."\", ".$cust_id." ";
		$query = "insert into `BOOKING`(`Table_Num`,`Date`,`Time`,`Cust_Id`)values (".$items.");";
		mysql_query($query);
		echo "<script type=\"text/javascript\">"."\n";
			echo "alert(\"Booking Done!!!\");"."\n";
		echo "</script>"."\n";
		echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=user.html\">";

	}
	add_customer_booking(
			$_POST["firstname"],
			$_POST["lastname"],
			$_POST["contact"],
			$_POST["email_id"],
			$_POST["table_number"],
			$_POST["date"],
			$_POST["time"]);
?>
<body background="1.png">
</body>
</html>
