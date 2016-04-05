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

//>>>>>>>>>>>>>>>>>>>>>>modify from here>>>>>>>>>>>>>>>>>>>>
function get_model()
{
	var str=document.getElementById("dp1")
	var date=str.value
	//document.write(a)
	var url="ajax_get.php?view_step=1"
	url=url+"&date="+date
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("build_model_container").innerHTML=xmlhttp.responseText;
		}
	});
}




</script>
