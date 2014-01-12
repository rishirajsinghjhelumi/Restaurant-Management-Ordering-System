<html>
<title>Delete Ingredients</title>
<h1 style="text-align:center"> Delete Ingredients </h1><br/><br/>
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
	function delete_ingredient($ing)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(empty($ing))
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Ingredients Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
		else
		{
			$num_ing = count($ing);
			for($i=0;$i<$num_ing;$i++)
			{
				$query = "DELETE FROM INGREDIENT WHERE Ingredient_Id = $ing[$i];";
				mysql_query($query);
			}
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"Selected Ingredients Deleted!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
	}
	delete_ingredient(
		$_POST["ingredient"]);
?>
</html>
</body>
</html>
