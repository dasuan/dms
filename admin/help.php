<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");

check_permission($level_help);

echo '<p>有问题请联系： <br />
QQ &nbsp;1069072177 <br />
手机 158 6472 8220 <br />
</p>';

?>


<!-- <div style="position: fixed;bottom: 0;"> 
    <p class="text-muted"><a href="../">Front</a> &nbsp;&nbsp; Powered by <a href="http://github.com/dasuan">dasuan</a> &copy; <?php echo date("Y");?>, Copyleft. </p>
</div> -->
