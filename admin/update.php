<?php
//This is update page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
//Display welcome message
echo "<h1>This is update page</h1> ";

//This is choose update_date code   >>>>>>>>>>>step1
if (empty($_POST["date"]) && empty($_POST["routine_submit"]) ) {
	echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='date_form'>";
	require_once("date_form.php");
	echo "<input type='submit'  name='date_submit' value='SubmitDate' />";
	echo "</form>";
}

//This is input code         >>>>>>>>>>>>step2
elseif(empty($_POST["routine_submit"])){

	$date=$_POST["date"];
	$sql_checkdate="SELECT * FROM routine where date = '" . $date ."'";
	$result_of_date_check = $db->query($sql_checkdate);

	if ($result_of_date_check->num_rows == 0) {
		echo "The $date Record does not exists!<br />";
	}
	else{
		echo "date is $date";
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."?date=$date"."' name='routine_form'>";
		echo "<table>
			<tr>
			<th>宿舍号</th>
			<th>成绩</th>
			<th>注释</th>
			</tr>";
		$sql="SELECT * FROM dorm";
		$result = $db->query($sql);
		$i = 0;
		while($row = $result_of_date_check->fetch_array(MYSQLI_ASSOC)){
			//per row define
			echo "<tr>";
			echo "<td><input type='text' value='" . $row['dorm_num'] . "' readonly /></td>";

			//echo "<td>" .$row['score']."</td>" ;
			//$row['score'] add to below require
			echo "<td>";
			require("droplist_display_value.php");
			echo "</td>";

			echo "<td>";
			$comments=$row['comments'];
			echo "<input type='text' name='comment" . "$i". "' value='$comments' required />";
			echo "</td>";
			echo "</tr>";

			$i++;
		}
		echo "</table>";
		echo "<input type='submit'  name='routine_submit' value='routine_Submit' />";
		echo "</form>";
	}

}
//This is post routine code       >>>>>>>>>>>step3
else{
	//var_dump($_POST);
	$sql_select="SELECT * FROM dorm";
	$result_select = $db->query($sql_select);
	$i = $result_select->num_rows;
	$date=$_GET["date"];

	for ($j=0; $j<$i; $j++) {	

		//	$date=date("Y.m.d")；
		$row = $result_select->fetch_array(MYSQLI_ASSOC);
		$b=$row['dorm_num'];
		$c="score"."$j";
		$d="comment"."$j";
		$cc=$_POST[$c];
		$dd=$_POST[$d];

		//This is test code, do not del 
		// echo "i = $i <br />";
		// echo "j = $j <br />";
		// echo "date: $date <br />";
		// echo "b: $b <br />";
		// echo "c: $c <br />";
		// echo "cc: $cc <br />";
		// echo "d: $d <br />";
		// echo "dd: $dd <br />";
		//$sql_insert="INSERT INTO routine(date, dorm_num, score,comments) VALUES ('$date','$b','$cc','$dd')";
		$sql_update="UPDATE routine SET score = '$cc' , comments = '$dd' WHERE date = '$date' and dorm_num = '$b' ";
		$db->query($sql_update) or die($db->error);
	}
		//Display added
		echo "Updated perfectly as below";
		$sql_checkdate="SELECT * FROM routine where date = '" . $date ."'";
		$result_of_date_check = $db->query($sql_checkdate);

		if ($result_of_date_check->num_rows != 0) {
			echo "<table border='1'>";
			$i = 0;
			while($row = $result_of_date_check->fetch_array(MYSQLI_ASSOC)){
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
}
















require_once("footer.php");
?>
