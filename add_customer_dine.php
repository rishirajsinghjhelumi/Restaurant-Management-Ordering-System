<html>
<head>
<title> Add Customer </title>
</head>
<body>
<h1 style="text-align:center"> Customer Registration </h1><br/><br/>
<body background = "1.png">
<script type="text/javascript" src="check_form_validate.js"></script>
<form name = "form1"action = "insert_customer_dine.php" method = "post" onsubmit="return checkscript()">

<table border=2 style=text-align:center; align=center width=500>
<tr><label for = "firstname"><td>First name: </td></label><td><input type = "text" name = "firstname"></td></tr>
<tr><label for = "lastname"><td>Last name: </td></label><td><input type = "text" name = "lastname"></td></tr>
<?php
	$c = $_POST["contact"];
	echo "<tr><label for = \"contact\"><td>Contact: </td></label><td><input type = \"text\" name = \"contact\" value=\"$c\" readonly=\"readonly\"></td></tr>";
?>
<tr><label for = "email_id"><td>Email Id: </td></label><td><input type = "text" name = "email_id"></td></tr>
</table><br/>
<table border=0 style=text-align:center; align=center><tr><td><input type="submit" name="submitbutton" value="Add"></td></tr></table>

</form>

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
</body>
</html>
