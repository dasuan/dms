<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");

echo '
<ol class="breadcrumb">
  <li><a href="index.php">主页</a></li>
  <li><a href="import.php">导入</a></li>
  <li class="active">导入宿舍</li>
</ol>
';

require_once("import_list.php");


//Display welcome message
echo "<h1>This is import_dorm</h1> ";
echo "<p>警告：此操作会删除并重建所有宿舍并且不可逆，请确保一次性导入正确的格式！</p> ";
echo "<p>格式要求：</p> ";
echo "<p>条件要求：宿舍号不能重复！除宿舍号外的其它字段的值必须与宿舍号对应，学生表中宿舍号必须在此表内！</p> ";

$deleterecords = "TRUNCATE TABLE dorm"; //empty the table of its current records
//Upload File
if (isset($_POST['submit'])) {
	//truncate the table
	$db->query($deleterecords);//$deleterecords was defiend at begin, for change code convenient
	if(!$result = $db->query($deleterecords)){
    	//die('There was an error running the query [' . $db->error . ']');
    	echo 'There was an error running the query [' . $db->error . ']';
	}

	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
//      commented below is just one line show, jack changed this
//		readfile($_FILES['filename']['tmp_name']);
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	//display data and rewind
	while(! feof($handle)){
		echo fgets($handle). "<br />";
	}
	rewind($handle);
	//Read and insert
	fgetcsv($handle, 1000, ",");
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$import="INSERT into dorm(dorm_num,total) values('$data[0]','$data[1]')";//query statement		
		$db->query($import) or die($db->error);//$import was defined at beginning, for easy to modifycode
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
