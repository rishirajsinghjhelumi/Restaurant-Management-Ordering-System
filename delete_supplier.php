<html>
<title>Delete Suppliers</title>
<h1 style="text-align:center"> Delete Suppliers </h1><br/><br/>
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
	function delete_supplier($supplier)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(empty($supplier))
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Suppliers Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
		else
		{
			$num_supp = count($supplier);
			for($i=0;$i<$num_supp;$i++)
			{
				$query = "DELETE FROM SUPPLIER WHERE Contact = $supplier[$i];";
				mysql_query($query);
			}
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"Selected Suppliers Deleted!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
	}
	delete_supplier(
		$_POST["supplier"]);
?>
</html>
</body>
</html>
