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

//>>>>>>>>>>>>>>>>>>>>>> View Add func >>>>>>>>>>>>>>>>>>>>
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

function get_dorm_list(str)
{

	//document.write(a)
	var url="ajax_get.php?view_step=2"
	url=url+"&"+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			
			document.getElementById("dorm_model_container").innerHTML=xmlhttp.responseText;
			$(function(argument) {
				$('[type="checkbox"]').bootstrapSwitch();
				// $(document).ajaxComplete(function(event, xhr, settings) {
				// 	$('[type="checkbox"]').bootstrapSwitch();
				// });
			})
		}
	});
}



//>>>>>>>>>>>>>>>>>>>>>> View Display func >>>>>>>>>>>>>>>>>>>>

function view_display_get_dorm_model()
{
	var str=document.getElementById("dp1")
	var date=str.value
	//document.write(a)
	var url="ajax_get.php?view_display_step=1"
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

function view_display(str)
{

	//document.write(a)
	var url="ajax_get.php?view_display_step=2"
	url=url+"&"+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			
			document.getElementById("dorm_model_container").innerHTML=xmlhttp.responseText;

			/*
			$(function(argument) {
				$('[type="checkbox"]').bootstrapSwitch();
				// $(document).ajaxComplete(function(event, xhr, settings) {
				// 	$('[type="checkbox"]').bootstrapSwitch();
				// });
			})
			*/
		}
	});
}

//>>>>>>>>>>>>>>>>>>>>>> View del func >>>>>>>>>>>>>>>>>>>>


function view_del_get_build()
{
	var str=document.getElementById("dp1")
	var date=str.value
	//document.write(a)
	var url="ajax_get.php?view_del_step=1"
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

function view_del_get_dorm(str)
{

	//document.write(a)
	var url="ajax_get.php?view_del_step=2"
	url=url+"&"+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{				
			document.getElementById("dorm_model_container").innerHTML=xmlhttp.responseText;
			
			//check box			
			$(function(argument) {
				$('[type="checkbox"]').bootstrapSwitch();
			})
			
		}
	});
}



</script>
