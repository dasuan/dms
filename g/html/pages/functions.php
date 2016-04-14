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
	//global $_SERVER['REMOTE_ADDR'];
	//global $_SERVER['HTTP_X_FORWARDED_FOR'];
	$log_time=date("Y-m-d  H:i:s");
	$user_name=$_SESSION['user_name'];
	$user_agent=$_SERVER['HTTP_USER_AGENT'];
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ipa=$_SERVER['REMOTE_ADDR'];
		$ipb=$_SERVER['HTTP_X_FORWARDED_FOR'];
		$sql_log="INSERT INTO log(log_time,user_name,action,ipa,ipb,user_agent) VALUES ('$log_time','$user_name','$action','$ipa','$ipb','$user_agent')";
	}else{
		$ipa=$_SERVER['REMOTE_ADDR'];
		$sql_log="INSERT INTO log(log_time,user_name,action,ipa,user_agent) VALUES ('$log_time','$user_name','$action','$ipa','$user_agent')";
	}

	$db->query($sql_log) or die($db->error);
}
//add_page need
function drop_list_20($col,$i){
	echo "<select name='$col$i' id='$col$i' class= 'form-control'>";
	echo '
	<option value="20" selected="selected">20</option>
	<option value="15">15</option>
	<option value="10">10</option>
	<option value="5">5</option>
	<option value="0">0</option>
	</select>
	';
}



function check_permission($need_level){
	global $USER_LEVEL;
	if(isset($_SESSION['user_level'])){
		//$user_level=$_SESSION['user_level']; //defined in load
		//$user_level += 0;
		if($USER_LEVEL > $need_level){
			die("你没有权限查看此页！");
		}
	}else{
		die("你没有权限查看此页！");
	}
	
	// echo gettype($user_role), "\n";
	// echo gettype($level), "\n";
}





	



?>