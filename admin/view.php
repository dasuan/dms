<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
check_permission(5);


echo '
<div class="panel panel-info">
    <div class="panel-heading">概况</div>
    <div class="panel-body">
        ';
        require_once("date_form_view.php");
        echo '<button class="btn btn-default" onclick="get_model()">图形化显示</button>';
        echo '
    </div>
</div>';

require_once("view_js.php");

echo '
<div class="panel panel-default build_model_container_panel">
    <!--div class="panel-heading">图形化显示</div-->
    <div class="panel-body build_model_container" id="build_model_container">
    <style>
        .build_model_container_panel{
            visibility:hidden;
        }
         
    </style>
    ';
echo '</div></div>';
    





?>