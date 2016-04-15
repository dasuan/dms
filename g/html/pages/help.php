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





    <div class="jumbotron app-header">
        <div class="container">
            <h2 class="text-center"><i class="app-logo fa fa-question-circle fa-5x color-white"></i><div class="color-white">帮助</div></h2>



        </div>
    </div>


    <div class="container-fluid app-content-a">
        <div class="container">        
            <div class="row text-center">

                 <div class="col-md-4 col-sm-6">
                    <span class="fa-stack fa-lg fa-3x" style="visibility: hidden;">
                      <i class="fa fa-circle-thin fa-stack-2x"></i>
                      <i class="fa fa-envelope-o fa-stack-1x"></i>
                    </span>
                  <h2>有问题请联系：</h2>

                </div>

                <div class="col-md-4 col-sm-6" >
                <a href="tencent://QQInterLive/?Cmd=2&Uin=1069072177">
                    <span class="fa-stack fa-lg fa-5x">
                      <i class="fa fa-circle-thin fa-stack-2x"></i>
                      <i class="fa fa-qq fa-stack-1x"></i>
                    </span>

                    <h2>1069072177</h2>
                </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <span class="fa-stack fa-lg fa-5x">
                      <i class="fa fa-circle-thin fa-stack-2x"></i>
                      <i class="fa fa-mobile fa-stack-1x"></i>
                    </span>
                    <h2>15864728220</h2>

                </div>



            </div>                
        </div>
    </div>


    <div class="container-fluid app-content-b feature-1 dorm1">
        <div class="container">
            <div class="row" id="build_model_container">

            <h2 class="alert alert-danger">请务必使用Chrome浏览器，或将浏览器切换到 <strong>极速模式！</strong>
            <img src="../../../admin/images/webkit.png" /></h1>

            </div>
        </div>
    </div>




            



<!-- /END THE FEATURETTES -->
<!-- FOOTER -->
<footer class="app-footer">
  <div class="container">
    <!-- <hr /> -->
    <p class="text-muted">Powered by <a href="http://github.com/dasuan">dasuan</a> &copy; <?php echo date("Y");?>, Copyleft. </p>
</div>
</footer>

<!-- /.container -->
</body>

</html>

