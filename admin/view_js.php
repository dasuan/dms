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


//>>>>>>>>>>>>>>>>>>>>>> View Display date >>>>>>>>>>>>>>>>>>>>

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


<?php
$filename='export';
require_once("view_display_export_js.php");
?>




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

//>>>>>>>>>>>>>>>>>>>>>> View update start >>>>>>>>>>>>>>>>>>>>




//<<<<<<<<<<<<<<<<<<<<<< View update end    <<<<<<<<<<<<<<<<<<<<<<<
function view_update_get_build()
{
	var str=document.getElementById("dp1")
	var date=str.value
	//document.write(a)
	var url="ajax_get.php?view_update_step1=1"
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

function view_update_get_dorm(str)
{

	//document.write(a)
	var url="ajax_get.php?view_update_step2=1"
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


//>>>>>>>>>>>>>>>>>>>>> view dorm >>>>>>>>>>>>>>>>>>>>>>
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

		}
	});
}

// function toggle(source) {
// 	var checkboxes = document.getElementsByClassName('check');

// for(var i=0, n=checkboxes.length;i<n;i++) {
//     checkboxes[i].checked = source.checked;
//   }
// }

//>>>>>>>>>>>>>>>>>>>>> stu_m >>>>>>>>>>>>>>>>>>>>>>

function stu_m_get_dorm(str)
{

	//document.write(a)
	var url="ajax_get.php?stu_m_step=2"
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

			$(".dorm3").css({
								"display":"none"								
							});


			$("html,body").animate({scrollTop: $("#dorm_model_container").offset().top-62}, 500);

		}
	});
}

function stu_m_get_last(str)
{

	//document.write(a)
	var url="ajax_get.php?stu_m_step=3"
	url=url+"&dorm_num="+str
	url=url+"&sid="+Math.random()

	loadXMLDoc(url,function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			
			document.getElementById("routine_model_container").innerHTML=xmlhttp.responseText;
			$(function(argument) {
				$('[type="checkbox"]').bootstrapSwitch();
			});

			$(".dorm3").css({
					"display":"block"					
				});

			$("html,body").animate({scrollTop: $("#routine_model_container").offset().top-62}, 500);

<?php
for ($x=1; $x<=6; $x++) {
echo '
$(document).ready(function repeat'.$x.'(){
        $(".edit_comment").show("fast");
        $(".input_comment_readonly").attr("readonly", true);

        $(".input_comment").hide();
        $(".submit_comment").hide();
        $(".cancel_edit").hide();

// Bind to the submit event of our form
$("#stu_comment_form'.$x.'").submit(function(event){

// Variable to hold request
var request;


    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Lets select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Lets disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "stu_m_ajax.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");

        document.getElementById("stu_comment'.$x.'").innerHTML=response;

		$(document).ready(repeat'.$x.'());



    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

    // Prevent default posting of form
    event.preventDefault();
});

});
';
}
?>







































		}
	});
}




</script>
