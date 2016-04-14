<?php
//This is display page
//no auth
require_once("load.php");
require_once("db_connection.php");
require_once("functions.php");
// no level
//check_permission($level_add);

require_once("view_js.php");

?>


<!DOCTYPE html>
<html>

<head>
    <title>中德DMS - 中德科技学院 宿舍成绩管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <!--link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'-->
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="../../lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/themes/flat-blue.css">

    <!-- <link href="css/datepicker.css" rel="stylesheet"> -->

    <!-- Javascript Libs -->
    <script type="text/javascript" src="../../lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../lib/js/Chart.min.js"></script>
    <script type="text/javascript" src="../../lib/js/bootstrap-switch.min.js"></script>
    <script type="text/javascript" src="../../lib/js/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="../../lib/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../lib/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../lib/js/select2.full.min.js"></script>
    <script type="text/javascript" src="../../lib/js/ace/ace.js"></script>
    <script type="text/javascript" src="../../lib/js/ace/mode-html.js"></script>
    <script type="text/javascript" src="../../lib/js/ace/theme-github.js"></script>

</head>

<body class="flat-blue landing-page">
    <nav class="navbar navbar-inverse navbar-fixed-top  navbar-affix" role="navigation" data-spy="affix" data-offset-top="60">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <div class="icon fa fa-paper-plane"></div>
                    <div class="title">中德DMS</div>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse " aria-expanded="true">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">首页</a></li>
                    <li><a href="#about">关于</a></li>
                    <li><a href="#contact">管理员登陆</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <div class="jumbotron app-header">
        <div class="container">
            <h2 class="text-center"><i class="app-logo fa fa-connectdevelop fa-5x color-white"></i><div class="color-white">中德科技学院 宿舍成绩公示</div></h2>

            <p class="text-center color-white app-description">

            </p>

            <!--             <p class="text-center"><a class="btn btn-primary btn-lg app-btn" href="#" role="button">Learn more »</a></p> -->

        </div>
    </div>

    <div class="container-fluid app-content-a">
        <div class="container">        <div class="row text-center">
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="fa fa-calendar fa-stack-1x"></i>
              </span>
              <h2>By日期</h2>



              <!-- <input type="text" class="span2 form-control drop_list_add" value="2016-04-14" id="dp1" name="date" onchange="get_model(this.value)" onselect="get_model(this.value)" style="width: 100px;margin:0 auto;" required /> -->


              <?php require_once("date_form_view.php");?>

              <a class="btn btn-primary _btn-lg app-btn" href="#sec1" role="button" onclick="view_display_get_dorm_model()">提交</a>

            </div>
<!--********************************************************************************************-->
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="fa fa-building-o fa-stack-1x"></i>
              </span>
              <h2>By宿舍号</h2>

              <a class="btn btn-primary _btn-sm app-btn" href="#sec1" role="button" onclick="view_dorm_build()">提交</a>
            </div>
<!--********************************************************************************************-->
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="fa fa-user fa-stack-1x"></i>
              </span>
              <h2>By学号</h2>


                <input id="stu_id" class="form-control" type="text" name="stu_id" placeholder="请输入学号" style="width: 150px;display: inline;" required />
                <a class="btn btn-primary _btn-lg app-btn" href="#sec1" role="button" onclick="view_display_stu()">提交</a>
            </div>

    </div>       
    </div>
        <div id="sec1" style="visibility:hidden;">this is for jump sec1</div>
    </div>

    <div class="container-fluid app-content-b feature-1 dorm1">
        <div class="container">
            <div class="row" id="build_model_container">

                <style>               
                    .dorm1{
                        display:none;
                    }      
                </style>

            </div>
        </div>
        <div id="sec2" style="visibility:hidden;">this is for jump sec2</div>
    </div>

    <div class="container-fluid app-content-a feature-1 dorm2">
        <div class="container">
            <div class="row" id="dorm_model_container">

                <style>               
                    .dorm2{
                        display:none;
                        /*height:200px;*/
                    }        
                </style>


            </div>
        </div>
        <div id="sec3" style="visibility:hidden;">this is for jump sec3</div>
    </div>

    <div class="container-fluid app-content-b feature-1 dorm3">
        <div class="container">
            <div class="row" id="routine_model_container">

                <style>

                    .dorm3{
                        display:none;
                        /*height:200px;*/
                    }        
                </style>



            </div>
        </div>
    </div>





<!-- /END THE FEATURETTES -->
<!-- FOOTER -->
<footer class="app-footer">
  <div class="container">
    <!-- <hr /> -->
    <p class="text-muted">Powered by <a href="http://github.com/dasuan">dasuan</a> &copy; 2016, Copyleft. </p>
</div>
</footer>

<!-- /.container -->
</body>

</html>

