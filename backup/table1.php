<?php
//just a sample for future use
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
// change character set to utf8 and check it
if (!$db->set_charset("utf8")) {
    die('Unable to change character set to utf8 [' . $db->error . ']');
}

$sql="SELECT * FROM students";
$result = $db->query($sql);

echo "<table border='1'>
<tr>
<th>id</th>
<th>name</th>
<th>sex</th>
<th>dorm_num</th>
</tr>";

while($row = $result->fetch_array(MYSQLI_ASSOC)){
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['sex'] . "</td>";
	echo "<td>" . $row['dorm_num'] . "</td>";
	echo "</tr>";
}

?>