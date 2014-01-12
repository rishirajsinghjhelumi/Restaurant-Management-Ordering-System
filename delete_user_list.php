<html>
<title>Delete Users</title>
<h1 style="text-align:center"> Delete Users </h1><br/><br/>
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
	function delete_users($user_id)
	{	
		$dbc = mysql_connect('localhost','root','rishi');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(empty($user_id))
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No Users Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
		else
		{
			$num_users = count($user_id);
			for($i=0;$i<$num_users;$i++)
			{
				$query = "DELETE FROM USER WHERE User_Id = $user_id[$i];";
				mysql_query($query);
			}
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"Selected Users Deleted!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">"."\n";
		}
	}
	delete_users(
		$_POST["user"]);
?>
</html>
</body>
</html>
