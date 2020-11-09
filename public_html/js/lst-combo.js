function doHi(val,btnVal)
{
	alert("Hello:"+val);
	alert(btnVal);
}

function chkName(val)
{
	alert(val);
}

function chkPass(ref,refSpan)
{
	//alert(ref.value);
	var len=ref.value.length;
	if(len<=4)
	{
		ref.style.backgroundColor="red";
		refSpan.innerHTML="Weak...";
	}
	else
		if(len<=8)
		{
			ref.style.backgroundColor="blue";
			refSpan.innerHTML="strong...";
		}
	else
	{
		ref.style.backgroundColor="green";
		refSpan.innerHTML="Bahoooot Strong...";
	}
}

function doShow(city)
{
	//alert(city);
	var pos=document.getElementById("city").selectedIndex;
	var val=document.getElementById("city").value;
	alert(pos+"   "+val);
}
function showSelected(lstAry)
{
	var res="";
	//alert(ref.value);
	//alert(ref.selectedIndex);
	for(i=0;i<lstAry.length;i++)
		{
			if(lstAry[i].selected==true)
				res=res+lstAry[i].value+",";
				//alert(lstAry[i].value+"  "+lstAry[i].text);
		}
	res=res.substr(0,res.length-1);
	document.getElementById("txtPlaces").value=res;
}