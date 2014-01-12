function checkscript()
{
	var els=document.form1.elements;
	var l=els.length;
	var rad = new Array();
	var rad_ind = 0;
	var chk = new Array();
	var chk_ind = 0;
	for (var i=0; i<l; i++)
	{
		if(els[i].type == "radio")
		{
			var check = 1;
			for(var j=0;j<rad_ind;j++)
			{
				if(rad[j]==els[i].name)
				{
					check = 0;
					break
				}
			}
			if(check)
				rad[rad_ind++] = els[i].name;
		}
		else if(els[i].type=="checkbox")
		{
			var check = 1;
			for(var j=0;j<chk_ind;j++)
			{
				if(chk[j]==els[i].name)
				{
					check = 0;
					break
				}
			}
			if(check)
				chk[chk_ind++] = els[i].name;
		}
		else
		{
			var x=document.forms["form1"][els[i].name].value;
			var a = els[i].name + " cannot be empty!!!";
			if (x==null || x=="")
			{
				alert(a);
				return false;
			}
		}
	}
	for(var i=0;i<rad_ind;i++)
	{
		var but = document.getElementsByName(rad[i]);
		var check = false;
		for (var j=0;j<but.length;j++)
		{
			if(but[j].checked)
			{
				check = true;
				break;
			}
		}
		if(check==false)
		{
			var a = rad[i] + " must be selected!!!";
			alert(a);
			return false;
		}
	}
	for(var i=0;i<chk_ind;i++)
	{
		var but = document.getElementsByName(chk[i]);
		var check = false;
		for (var j=0;j<but.length;j++)
		{
			if(but[j].checked)
			{
				check = true;
				break;
			}
		}
		if(check==false)
		{
			var a = "Atleast 1 " + chk[i] + " must be selected!!!";
			alert(a);
			return false;
		}
	}
	return true;
}
