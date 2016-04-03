<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
echo '
<ol class="breadcrumb">
  <li><a href="index.php">主页</a></li>
  <li><a href="import.php">导入</a></li>
  <li class="active">导入学生</li>
</ol>
';
require_once("import_list.php");


//Display welcome message
echo "<h1>This is import_stu</h1> ";
echo "<p>警告：此操作会删除并依据导入的文件重建所有学生信息，此操作不可逆，请确保一次性导入正确的格式！</p> ";
echo "<p>格式要求：</p> ";
echo "<p>条件要求：学生id不能重复！学生表中宿舍号必须在宿舍表内有唯一值对应！</p> ";


$deleterecords = "TRUNCATE TABLE students"; //empty the table of its current records
//$import="INSERT into students(id,name,sex,dorm_num) values('$data[0]','$data[1]','$data[2]','$data[3]')";
$data=array("a","a","a","a");
$import="INSERT into students(id,name,sex,dorm_num) values('$data[0]','$data[1]','$data[2]','$data[3]')";





//Upload File
if (isset($_POST['submit'])) {
	$db->query($deleterecords);
	if(!$result = $db->query($deleterecords)){
	    die('There was an error running the query [' . $db->error . ']');
	}

	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
//		readfile($_FILES['filename']['tmp_name']);
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	//display data and rewind
	while(! feof($handle)){
		echo fgets($handle). "<br />";
	}
	rewind($handle);

	fgetcsv($handle, 1000, ",");
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		echo "start_a ";
		echo "$data[0],$data[1],$data[2],$data[3]";
		echo " end_a <br />";
		$import="INSERT into students(id,name,sex,dorm_num,bed_num) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
		echo "start_b ";
		echo "$data[0],$data[1],$data[2],$data[3]";
		echo " end_b <br />";
		$db->query($import) or die($db->error);
	}

	fclose($handle);

	print "<br />" . "Import done";

	//view upload form
}else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	$this_page=$_SERVER['PHP_SELF'];

	print "<form enctype='multipart/form-data' action='".$this_page."' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";
}


require_once("footer.php");
?>


