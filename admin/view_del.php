<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
check_permission($level_del);

echo '
<ol class="breadcrumb">
<li><a href="index.php">主页</a></li>
<li class="active">删除</li>
</ol>';

echo '
<div class="panel panel-info">
    <div class="panel-heading">删除</div>
    <div class="panel-body">
        ';
        require_once("date_form_view_added.php");
        echo '<a class="btn btn-default" onclick="view_del_get_build()">提交</a>';
        echo '
    </div>
</div>';

require_once("view_js.php");

echo '<div  id="build_top">喔喔~看不见我~看不见我~</div>';
echo '
<div class="panel panel-default build_model_container_panel" id="button_1">
    
    <div class="panel-body build_model_container" id="build_model_container">
    <style>
        .build_model_container_panel{
            visibility:hidden;
            /*height:200px;*/
        }        
    </style>
    ';
echo '</div></div>';

echo '<div  id="dorm_top">喔喔~也看不见我~看不见我~</div>';
echo '
<div class="panel panel-default dorm_model_container_panel" id="button_2">

    <div class="panel-body dorm_model_container" id="dorm_model_container">
        <style>
        .dorm_model_container_panel{
            visibility:hidden;
            /*height:500px;*/

        }
        .main{
            height:1500px;
        }
         
    </style>

    ';      
echo '</div></div>';

    
?>

<style>
#build_top{
    /*position: fixed;*/
    position: absolute;
    top:180px;
    visibility:hidden;
    
}
#dorm_top{
    position: absolute;
    top:650px;
    visibility:hidden;
}




    .build_model_container_panel{
       /*margin-top: 50px;*/
    }
    .dorm_model_container_panel{
        /*margin-bottom: 50px;*/
    }
</style>



<!--This is for check box-->
<link href="css/bootstrap-switch.min.css" rel="stylesheet">
<script src="js/bootstrap-switch.min.js"></script>

<script>
// $(function(argument) {
//   $('[type="checkbox"]').bootstrapSwitch();
//  $(document).ajaxComplete(function(event, xhr, settings) {
//       $('[type="checkbox"]').bootstrapSwitch();
//    });
// })
</script>
