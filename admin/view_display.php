<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
check_permission($level_display);

echo '
<ol class="breadcrumb">
<li><a href="index.php">主页</a></li>
<li class="active">查询</li>
</ol>';




echo '
<div class="panel panel-info width33">
    <div class="panel-heading">通过日期查询</div>
    <div class="panel-body">
        ';

//Add contents start

        echo '<a class="btn btn-default btn_add" href="view_display_date.php">选择日期</a>';

//Add contents finish

        echo '
    </div>
</div>';
//Panel end    <<<<<<<<<<<<<<<<<<<<<<<<




//choose dorm_num
echo '
<div class="panel panel-info width33">
    <div class="panel-heading">通过宿舍号查询</div>
    <div class="panel-body">
        ';
//Add contents start

        echo '<a class="btn btn-default btn_add" href="view_display_dorm.php">选择宿舍</a>';

//Add contents finish
        echo "
    </div>
</div>";

//choose student id
echo '      
<div class="panel panel-info width33">
    <div class="panel-heading">通过学号查询</div>
    <div class="panel-body">
        ';
//Add contents start

        echo '<a class="btn btn-default btn_add" href="view_display_stu.php">输入学号</a>';

//Add contents finish
        echo "
    </div>
</div>";


?>

<style type="text/css">
    .width33{
        width: 30%;
        float: left;
        margin-right: 3%;
    }
</style>