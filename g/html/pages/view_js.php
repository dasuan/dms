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


//>>>>>>>>>>>>>>>>>>>>>> View Display date func >>>>>>>>>>>>>>>>>>>>

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
			//do not display dorm2 dorm3
			$(".dorm2").css({
								"display":"none"								
							});
			$(".dorm3").css({
								"display":"none"								
							});

			$("html,body").animate({scrollTop: $("#build_model_container").offset().top}, 500);

			

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


			<?php
			$filename='export';
			require_once("view_display_export_js.php");
			?>

			$(".dorm2").css({
					"display":"block"					
				});


			$("html,body").animate({scrollTop: $("#dorm_model_container").offset().top-80}, 500);




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


//>>>>>>>>>>>>>>>>>>>>>  dorm >>>>>>>>>>>>>>>>>>>>>>
function view_dorm_build(str)
{

	//document.write(a)
	var url="ajax_get.php?view_dorm_step=1"
	url=url+"&"+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			
			document.getElementById("build_model_container").innerHTML=xmlhttp.responseText;
			$(function(argument) {
				$('[type="checkbox"]').bootstrapSwitch();
			})

			$(".dorm2").css({
								"display":"none"								
							});
			$(".dorm3").css({
								"display":"none"								
							});

			$("html,body").animate({scrollTop: $("#build_model_container").offset().top-80}, 500);


		}
	});
}





function view_get_dorm(str)
{

	//document.write(a)
	var url="ajax_get.php?view_dorm_step=2"
	url=url+"&"+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			
			document.getElementById("dorm_model_container").innerHTML=xmlhttp.responseText;
			$(function(argument) {
				$('[type="checkbox"]').bootstrapSwitch();
			})

			$(".dorm2").css({
					"display":"block"					
				});

			$("html,body").animate({scrollTop: $("#dorm_model_container").offset().top-80}, 500);

		}
	});
}

function view_dorm_routine(str)
{

	//str.replace(/#/,"%23")
	var url="ajax_get.php?view_dorm_step=3"
	url=url+"&dorm_num="+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
	
			document.getElementById("routine_model_container").innerHTML=xmlhttp.responseText;
			<?php
			$filename='export';
			require("view_display_export_js.php");
			?>	

			$(".dorm3").css({
					"display":"block"					
				});

			$("html,body").animate({scrollTop: $("#routine_model_container").offset().top-80}, 500);

		}
	});
}

//>>>>>>>>>>>>>>>>>>>>>>>>> stu_id >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function view_display_stu()
{
	var str=document.getElementById("stu_id")
	var stu_id=str.value
	//document.write(a)
	var url="ajax_get.php?view_display_stu=1"
	url=url+"&stu_id="+stu_id
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("build_model_container").innerHTML=xmlhttp.responseText;

			<?php
			$filename='export';
			require("view_display_export_js.php");
			?>	

			$(".dorm2").css({
								"display":"none"								
							});
			$(".dorm3").css({
								"display":"none"								
							});

			$("html,body").animate({scrollTop: $("#build_model_container").offset().top-80}, 500);

		}
	});
}



</script>
