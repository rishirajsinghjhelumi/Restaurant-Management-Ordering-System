<html>
<title> Update Ingredient</title>
<h1 style="text-align:center"> Update Ingredient</h1>
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
<?php
	function print_ingredient()
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$query = "Select * from INGREDIENT";
		$supp = mysql_query($query);
		$num_items = mysql_num_rows($supp);
		$num_fields = mysql_num_fields($supp);
		if(!$num_items)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Ingredient Added!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
			return;
		}
		echo "<form action=\"update_ingredient.php\" method=\"post\" align=\"center\">"."\n";
		echo "<table border=\"4\" style=\"text-align:center;\" align=\"center\" width=\"900\">"."\n";
		echo "<tr>\n";
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<td>\n";
			echo mysql_field_name($supp,$i);
			echo "</td>\n";
		}
		echo "<td>\n";
		echo "Select To Update"."\n";
		echo "</td>\n";
		echo "</tr>\n";
		for($i=0;$i<$num_items;$i++)
		{
			echo "<tr>\n";
			for($j=0;$j<$num_fields;$j++)
			{
				echo "<td>\n";
				echo mysql_result($supp,$i,$j)." "."\n";
				echo "</td>\n";
			}
			echo "<td>\n";
			$type="ingredient";
			$id = mysql_result($supp,$i,0);
			echo "<input type=\"radio\" name=\"$type\" value=\"$id\"><br/>"."\n";
			echo "</td>\n";
			echo "</tr>\n";
		}
		echo "</table>"."\n"."<br/>";
		echo "<input type=\"submit\" value=\"Update Selected Item\">"."\n";
	}
?>
<body background="1.png">
<?php
	print_ingredient();
?>
</body>
</html>
