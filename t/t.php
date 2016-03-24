<?php


define("DB_HOST", "localhost");
define("DB_NAME", "login");
define("DB_USER", "root");
define("DB_PASS", "m123");

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
// change character set to utf8 and check it
if (!$db->set_charset("utf8")) {
    die('Unable to change character set to utf8 [' . $db->error . ']');
}

$date="160319";
$b="101";
$cc="95";
$dd="77777";

	echo $date."<br />";
	echo $b."<br />";

	echo $cc."<br />";

	echo $dd."<br />";


$sql_insert="INSERT INTO routine(date, dorm_num, score,comments)
VALUES
('$date','$b','$cc','$dd')";

// $sql_insert="INSERT INTO routine(date, dorm_num, score,comment)
// VALUES
// ('$date','$row['dorm_num']','$_POST[$c]','$_POST[$d]')";
$db->query($sql_insert) or die($db->error);

echo "OK";


?>