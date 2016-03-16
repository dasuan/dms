<?php
//This is display page

require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");

echo "<h1>This is Display page!</h1>";

$sql="SELECT * FROM students";
$result = $db->query($sql);

echo "<table border='1'>
<tr>
<th>id</th>
<th>name</th>
<th>sex</th>
<th>dorm_num</th>
</tr>";

while($row = $result->fetch_array(MYSQLI_ASSOC))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['sex'] . "</td>";
  echo "<td>" . $row['dorm_num'] . "</td>";
  echo "</tr>";
  }



?>