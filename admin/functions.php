<?php

//Display tabel's data in table layout
//When you modify db_tables, you don't need to modify code
//This function require an outside $db connection object created by "new mysqli()"
//Example: 
// $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// if($db->connect_errno > 0){
//     die('Unable to connect to database [' . $db->connect_error . ']');
// }
// if (!$db->set_charset("utf8")) {
//     die('Unable to change character set to utf8 [' . $db->error . ']');
// }
function table_get($table_name){
	global $db;
	$sql="SELECT * FROM ".$table_name;
	$result = $db->query($sql);
	echo "<table border='1' class='table table-bordered'>";
	$i = 0;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		if($i == 0){
			echo "<tr>";
			foreach($row as $x=>$x_value) {
				echo "<th>";
				echo $x;
				echo "</th>";
			}
			echo "</tr>";			
		}
		echo "<tr>";
		foreach($row as $x=>$x_value) {
			echo "<td>" .$x_value."</td>" ;
		}
		echo "</tr>";
		$i=1;
	}
}



function php_self(){
    $php_self=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
    return $php_self;
}

// need
function add_log($action,$db){
	$log_time=date("Y-m-d  h:i:s");
	$user_name=$_SESSION['user_name'];
	$sql_log="INSERT INTO log(log_time,user_name,action) VALUES ('$log_time','$user_name','$action')";
	$db->query($sql_log) or die($db->error);
}




?>