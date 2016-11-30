<?php
//error_reporting(E_ALL ^ E_NOTICE);
/**
 * A simple, clean and secure PHP Login Script / MINIMAL VERSION
 * For more versions (one-file, advanced, framework-like) visit http://www.php-login.net
 *
 * Uses PHP SESSIONS, modern password-hashing and salting and gives the basic functions a proper login system needs.
 *
 * @author Panique
 * @link https://github.com/panique/php-login-minimal/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("../config/db.php");

// include language to echo hint correctly
require_once("lang_zh.php");
 
require_once("functions.php");

// load the login class
require_once("../classes/Login.php");

date_default_timezone_set('Asia/Shanghai');

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

//... ask if we are not logged in here:
if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("../views/not_logged_in.php");
    die();
} 

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>console>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$logged_welcome = "Hey, " . $_SESSION['user_name'] . ", You are logged in.";
echo '
<script type="text/javascript">console.log("'.$logged_welcome.'")</script>     
';

$git_hub = "This project was developing by kyshel, github-> https://github.com/kyshel/dms";
echo '
<script type="text/javascript">console.log("'.$git_hub.'")</script>     
';

$trick = "Happy to listen your voice~ ;>";
echo '
<script type="text/javascript">console.log("'.$trick.'")</script>     
';
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>> load enviroment >>>>>>>>>>>>>>>>>>>>>>>

require_once("load.php");

?>



