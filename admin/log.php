<?php
//This is sample page! You can add contents here!
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php"); //must under db
check_permission($level_log);
//site map
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li class="active">日志</li>
</ol>
';

//Display welcome message

//sql
$table_name="log";
$sql="SELECT * FROM ".$table_name." ORDER BY log_id DESC";
$result = $db->query($sql);

//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-info">
			<div class="panel-heading">系统日志</div>
			<div class="panel-body" id="dvData">
			';//id="dvData" for export module
//Add contents start
echo "<table class='table table-bordered'>
				<tr>
					<th>事件id</th>
					<th>时间</th>
					<th>操作</th>
					<th>IP</th>
				</tr>";

while($row = $result->fetch_array(MYSQLI_ASSOC)){
echo "<tr>";

echo "<td>";
$log_id=$row['log_id'];
echo "$log_id";
echo "</td>";

echo "<td>";
$log_time=$row['log_time'];
echo "$log_time";
echo "</td>";

echo "<td>";
$user_name=$row['user_name'];
$action=$row['action'];
echo "用户 ".$user_name." $action";
echo "</td>";

echo "<td>";
$ipa=$row['ipa'];
$ipb=$row['ipb'];
if(empty($ipb)){
	echo "$ipa";
}else{
	echo "$ipa,$ipb";
}

echo "</td>";

echo "</tr>";
}

echo "</table>";			
//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<



require_once("footer.php");
?>
