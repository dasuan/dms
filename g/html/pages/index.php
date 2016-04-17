<?php
//This is display page
//no auth
require_once("load.php");
require_once("db_connection.php");
require_once("functions.php");
// no level
//check_permission($level_add);
require_once("header.php");

require_once("view_js.php");
?>





    <div class="jumbotron app-header" >
        <div class="container">
            <h2 class="text-center"><i class="app-logo fa fa-search fa-5x color-white"></i><div class="color-white">中德科技学院 宿舍成绩查询</div></h2>

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


              <?php 
              //Below will run sql to loop added date
              require_once("date_form_view_added.php");
              ?>

              <a class="btn btn-primary _btn-lg app-btn" role="button" onclick="view_display_get_dorm_model()">提交</a>

            </div>
<!--********************************************************************************************-->
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="fa fa-hotel fa-stack-1x"></i>
              </span>
              <h2>By宿舍号</h2>

              <a class="btn btn-primary _btn-sm app-btn" role="button" onclick="view_dorm_build()">提交</a>
            </div>
<!--********************************************************************************************-->
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="fa fa-user fa-stack-1x"></i>
              </span>
              <h2>By学号</h2>


                <input id="stu_id" class="form-control" type="text" name="stu_id" placeholder="请输入学号" style="width: 150px;display: inline;" required />
                <a class="btn btn-primary _btn-lg app-btn" role="button" onclick="view_display_stu()">提交</a>
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
<?php require_once("footer.php");?>

<!-- /.container -->
</body>

</html>

