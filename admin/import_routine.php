<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
//Display welcome message
echo "<h1>This is import_routine</h1> ";

$deleterecords = "TRUNCATE TABLE routine"; //empty the table of its current records
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
		$import="INSERT into routine(date,dorm_num,score,comments) values('$data[0]','$data[1]','$data[2]','$data[3]')";	
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
