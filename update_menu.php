<html>
<title> Update Menu </title>
<style type="text/css">
label{
float: left;
width: 300px;
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

<h1 style="text-align:center"> Update Menu </h1><br/><br/>
<?php
	function update_menu($menu_id)
	{
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(!$menu_id)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Item Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">";
			return;
		}
		echo "<form name = \"form1\" action = \"update_menu_values.php\" method =\"post\" align=\"center\" onsubmit=\"return checkscript()\">"."\n";
		echo "<table style=\"text-align:center;\" align=\"center\" width=\"400\">"."\n";
		$query = "SELECT * from MENU WHERE Menu_Id=$menu_id";
		$menu = mysql_query($query);
		$num_fields = mysql_num_fields($menu);
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<tr>"."\n";
			echo "<td>"."\n";
			$field = mysql_field_name($menu,$i);
			echo "<b>".$field."</b>"."\n";
			echo "</td>"."\n";
			echo "<td>"."\n";
			$res = mysql_result($menu,0,$i);
			if($i)
				echo "<input type = \"text\" name = \"$field\" value=\"$res\">";
			else
				echo "<input type = \"text\" name = \"menu_id\" value=\"$res\" readonly=\"readonly\">";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."\n"."<br/>";
		echo "<input type=\"submit\" name=\"submitbutton\" value=\"Update\">"."\n";
		echo "</form>"."\n";
	}

?>
<body background="1.png">
<?php
	update_menu(intval($_POST["menu"]));
?>
</body>
</html>
