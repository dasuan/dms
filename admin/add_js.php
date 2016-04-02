<script type="text/javascript">
var xmlhttp;
function loadXMLDoc(url,cfunc)
{
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	// if (xmlHttp==null)
	// {
	// 	alert ("Browser does not support HTTP Request")
	// 	return
	// } 
	xmlhttp.onreadystatechange=cfunc;
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

function f_region(str)
{
	var url="ajax_get.php?step=1"
	url=url+"&region="+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("build_num").innerHTML=xmlhttp.responseText;
		}
	});
}

function f_build_num(str)
{
	var region = document.getElementById('region');
	var url="ajax_get.php?step=2"
	url=url+"&region="+region.value
	url=url+"&build_num="+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("part").innerHTML=xmlhttp.responseText;
		}
	});
}
function f_part(str)
{
	var region = document.getElementById('region');
	var build_num = document.getElementById('build_num');
	var url="ajax_get.php?step=3"
	url=url+"&region="+region.value
	url=url+"&build_num="+region.value
	url=url+"&part="+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("floor").innerHTML=xmlhttp.responseText;
		}
	});
}
</script>
