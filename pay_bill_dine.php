<html>
<title>Bill</title>
<h1 style="text-align:center">Bill</h1><br/>
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
<body background = "1.png">
<?php
	function print_bill($menu_id,$cust_id,$fname,$lname,$contact,$email_id,$quantity,$table_num)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		else
		{
			$query = "SELECT * FROM CUSTOMER WHERE Customer_Id = $cust_id;";
			$res = mysql_query($query);
			$num = mysql_num_fields($res);
			echo "<table border=\"2\" style=\"text-align:center;\" align=\"center\" width=\"500\">"."\n";
			for($j=1;$j<$num;$j++)
			{
				echo "<tr>\n";
				echo "<td>\n";
				$field = mysql_field_name($res,$j);
				echo $field;
				echo "</td>\n";
				echo "<td>\n";
				$a = mysql_result($res,0,$j);
				echo "$a\n";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "</table><br/>\n";
			$query = "SELECT * FROM MENU;";
			$menu = mysql_query($query);
			$num_fields = mysql_num_fields($menu);
			echo "<table border=\"2\" style=\"text-align:center;\" align=\"center\" width=\"500\">"."\n";
			echo "<tr>\n";
			echo "<td>\n";
			echo "S.No"."\n";
			echo "</td>\n";
			for($i=1;$i<=2;$i++)
			{
				echo "<td>\n";
				echo mysql_field_name($menu,$i);
				if($i==2)
					echo " ($)";
				echo "</td>\n";
			}
			echo "<td>\n";
			echo "Quantity"."\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "Total ($)"."\n";
			echo "</td>\n";
			echo "</tr>\n";
			$total_amount = 0;
			$num_items = count($menu_id);
			for($i=0;$i<$num_items;$i++)
			{
				$query = "SELECT Name,Price FROM MENU WHERE Menu_Id=$menu_id[$i];";
				$menu = mysql_query($query);
				$num_fields =  mysql_num_fields($menu);
				echo "<tr>\n";
				echo "<td>\n";
				$i++;
				echo "$i\n";
				$i--;
				echo "</td>\n";
				for($j=0;$j<$num_fields;$j++)
				{
					echo "<td>\n";
					echo mysql_result($menu,0,$j)." "."\n";
					echo "</td>\n";
				}
				$id = $menu_id[$i];
				echo "<td>\n";
				$q = $quantity[$i];
				echo "$q\n";
				echo "</td>\n";
				echo "<td>\n";
				$p = mysql_result($menu,0,1); 
				$tot = doubleval($p)*doubleval($q);
				$total_amount += $tot;
				echo "$tot\n";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "</table>"."\n"."<br/>";
			echo "<table border=\"2\" style=\"text-align:center;\" align=\"center\" width=\"200\">"."\n";
			echo "</tr><td>Total Amount</td><td>$total_amount</td></tr>\n";
			echo "</table>"."\n"."<br/>";
			$items = "\"".$fname."\",\"".$lname."\",\"".$cust_id."\",\"".$total_amount."\"";
			$query = "insert into `BILL`(`Customer_Fname`,`Customer_Lname`,`Customer_Id`,`Total_Amount`)values (".$items.");";
			$result = mysql_query($query);
			$query = "SELECT * FROM BILL;";
			$res = mysql_query($query);
			$order_id = mysql_num_rows($res);
			for($i=0;$i<$num_items;$i++)
			{
				$query = "SELECT Name,Price FROM MENU WHERE Menu_Id=$menu_id[$i];";
				$menu = mysql_query($query);
				$q = $quantity[$i];
				$p = mysql_result($menu,0,1);
				$name = mysql_result($menu,0,0);
				$items = "\"".$order_id."\",\"".$name."\",\"".$q."\",\"".$p."\"";
				$query = "insert into `MENU_BILL`(`Order_Id`,`Name`,`Quantity`,`Price`)values (".$items.");";
				$result = mysql_query($query);
			}
		}
	}
	print_bill(
		$_POST["menu"],
		$_POST["Customer_Id"],
		$_POST["Fname"],
		$_POST["Lname"],
		$_POST["Contact"],
		$_POST["Email_Id"],
		$_POST["quantity"],
		$_POST["table_num"]
		);
?>
</body>
</html>
