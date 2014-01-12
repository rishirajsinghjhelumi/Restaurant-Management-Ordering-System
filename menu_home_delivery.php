<html>
<title> Select Menu Items</title>
<h1 style="text-align:center"> Select Menu Items</h1>
<style type="text/css">
div.div1
{
	text-align:center;
	font-weight: bold;
}
</style>
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
<script type="text/javascript" src="check_form_validate.js"></script>
<?php
	function print_menu()
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "Select * from MENU";
		$menu = mysql_query($query);
		$num_items = mysql_num_rows($menu);
		$num_fields = mysql_num_fields($menu);
		if(!$num_items)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Items In Menu !!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=user.html\">"."\n";
			return;
		}
		$cust_id = intval($_POST["cust_id"]);
		$query = "SELECT * FROM CUSTOMER WHERE Customer_Id = $cust_id;";
		$res = mysql_query($query);
		$num = mysql_num_fields($res);
		echo "<form name=\"form1\" action=\"menu_bill_home_delivery_confirm.php\" method=\"post\" align=\"center\" onsubmit=\"return checkscript()\">"."\n";
		echo "<table border=\"4\" style=\"text-align:center;\" align=\"center\" width=\"900\">"."\n";
		for($j=0;$j<$num;$j++)
		{
			echo "<tr>\n";
			echo "<td>\n";
			$field = mysql_field_name($res,$j);
			echo $field;
			echo "</td>\n";
			echo "<td>\n";
			$a = mysql_result($res,0,$j)." "."\n";
			echo "<input type = \"text\" name = \"$field\" value=\"$a\" readonly=\"readonly\">";
			echo "</td>\n";
			echo "</tr>\n";
		}
		echo "</tr>"."\n";
		echo "</table>"."\n"."<br/><br/>\n";
		echo "<table border=\"4\" style=\"text-align:center;\" align=\"center\" width=\"900\">"."\n";
		echo "<tr>\n";
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<td>\n";
			echo mysql_field_name($menu,$i);
			echo "</td>\n";
		}
		echo "<td>\n";
		echo "Select Items"."\n";
		echo "</td>\n";
		echo "</tr>\n";
		for($i=0;$i<$num_items;$i++)
		{
			echo "<tr>\n";
			for($j=0;$j<$num_fields;$j++)
			{
				echo "<td>\n";
				echo mysql_result($menu,$i,$j)." "."\n";
				echo "</td>\n";
			}
			echo "<td>\n";
			$type="menu[]";
			$id = mysql_result($menu,$i,0);
			echo "<input type=\"checkbox\" name=\"$type\" value=\"$id\"><br/>"."\n";
			echo "</td>\n";
			echo "</tr>\n";
		}
		echo "</table>"."\n"."<br/>";
		echo "<input type=\"submit\" value=\"Select Items\">"."\n";
		echo "</form>";
	}
?>
<body background="1.png">
<?php
	print_menu();
?>
</body>
</html>
