<?php
//This is sample page! You can add contents here!
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php"); //must under db
//Display welcome message

$table_name="log";
$sql="SELECT * FROM ".$table_name." ORDER BY log_id DESC";
$result = $db->query($sql);
echo "<table border='1' class='table table-bordered'>";

echo "<table class='table table-bordered'>
				<tr>
					<th>事件id</th>
					<th>时间</th>
					<th>操作</th>
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


echo "</tr>";
}

echo "</table>";



require_once("footer.php");
?>
