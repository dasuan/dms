<?php
require_once("auth.php"); // verify whether login
require_once("db_connection.php");

if($_GET["step"]=="1"){
	$region=$_GET["region"];
	echo "$region";
	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}else{
		die();
	}
	echo '<option value="" selected="selected">请选择楼号</option>';
	$sql="SELECT DISTINCT build_num FROM dorm WHERE region = '".$region."'";
	$result = $db->query($sql);
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value='".$row['build_num']."'>" . $row['build_num'] . "</option>";
	}

}elseif ($_GET["step"]=="2") {
	$build_num=$_GET["build_num"];
	$region=$_GET["region"];
	echo '<option value="" selected="selected">请选择AB区</option>';
	$sql="SELECT DISTINCT part FROM dorm WHERE build_num = '".$build_num."'& region = '".$region."'";
	$result = $db->query($sql);
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		if ($row['part']==0) {
			echo "<option value='".$row['part']."'>" . "此楼不分AB区" . "</option>";
		}else{
		echo "<option value='".$row['part']."'>" . $row['part'] . "</option>";
		}
	}
}elseif ($_GET["step"]=="3") {
	$region=$_GET["region"];
	$build_num=$_GET["build_num"];
	$part=$_GET["part"];
	echo '<option value="" selected="selected">请选择楼层</option>';
	$sql="SELECT DISTINCT floor FROM dorm WHERE build_num = '".$build_num."'& region = '".$region."' & part = '".$part."'";
	$result = $db->query($sql);
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value='".$row['floor']."'>" . $row['floor'] . "</option>";
	}
}



?>