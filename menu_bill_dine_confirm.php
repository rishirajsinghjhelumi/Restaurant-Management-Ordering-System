<html>
<title>Selected Menu Items</title>
<h1 style="text-align:center"> Selected Menu Items </h1><br/><br/>
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
<script>
function readOnlyCheckBox() {
	   return false;
}
</script>
<body background = "1.png">
<?php
	function select_menu($menu_id,$cust_id,$fname,$lname,$contact,$email_id)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(empty($menu_id))
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Items Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=ask_contact_home_delivery.php\">"."\n";
		}
		else
		{
			$query = "SELECT * FROM CUSTOMER WHERE Customer_Id = $cust_id;";
			$res = mysql_query($query);
			$num = mysql_num_fields($res);
			echo "<form action=\"pay_bill_dine.php\" method=\"post\" align=\"center\">"."\n";
			echo "<table border=\"4\" style=\"text-align:center;\" align=\"center\" width=\"900\">"."\n";
			for($j=0;$j<$num;$j++)
			{
				echo "<tr>\n";
				echo "<td>\n";
				$field = mysql_field_name($res,$j);
				echo $field;
				echo "</td>\n";
				echo "<td>\n";
				$a = mysql_result($res,0,$j);
				echo "<input type = \"text\" name = \"$field\" value=\"$a\" readonly=\"readonly\">";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "<tr>";
			echo "<td>Table Number</td><td>\n";
			$query = "SELECT Table_Number FROM TABLES;";
			$table = mysql_query($query);
			$num_tables = mysql_num_rows($table);
			echo "<select name = \"table_num\" style=\"width: 200px;\">";
			for($i=0;$i<$num_tables;$i++)
			{
				$val = mysql_result($table,$i,0);
				echo "<option value=\"$val\">$val</option>";
			}
			echo "</select></td>\n";
			echo "</tr>"."\n";
			echo "</table>"."\n"."<br/><br/>\n";
			$num_items = count($menu_id);
			$query = "SELECT * FROM MENU;";
			$menu = mysql_query($query);
			$num_fields = mysql_num_fields($menu);
			echo "<table border=\"4\" style=\"text-align:center;\" align=\"center\" width=\"900\">"."\n";
			echo "<tr>\n";
			for($i=0;$i<$num_fields;$i++)
			{
				echo "<td>\n";
				echo mysql_field_name($menu,$i);
				echo "</td>\n";
			}
			echo "<td>\n";
			echo "Selected"."\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "Quantity"."\n";
			echo "</td>\n";
			echo "</tr>\n";
			for($i=0;$i<$num_items;$i++)
			{
				$query = "SELECT * FROM MENU WHERE Menu_Id=$menu_id[$i];";
				$menu = mysql_query($query);
				echo "<tr>\n";
				for($j=0;$j<$num_fields;$j++)
				{
					echo "<td>\n";
					echo mysql_result($menu,0,$j)." "."\n";
					echo "</td>\n";
				}
				$type="menu[]";
				$quantity = "quantity[]";
				$id = $menu_id[$i];
				echo "<td>\n";
				echo "<input type=\"checkbox\" name=\"$type\" value=\"$id\" checked=\"checked\" onClick=\"return readOnlyCheckBox()\"><br/>"."\n";
				echo "</td>\n";
				echo "<td>\n";
				echo "<input type=\"text\" name=\"$quantity\" value=\"1\"><br/>"."\n";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "</table>"."\n"."<br/>";
			echo "<input type=\"submit\" value=\"Confirm\">"."\n";
			echo "</form>";
		//	echo "<script type=\"text/javascript\">"."\n";
		//	echo "</script>"."\n";
		}
	}
	select_menu(
		$_POST["menu"],
		$_POST["Customer_Id"],
		$_POST["Fname"],
		$_POST["Lname"],
		$_POST["Contact"],
		$_POST["Email_Id"]
		);
?>
</body>
</html>
