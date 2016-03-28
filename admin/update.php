<?php
//This is update page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php");
//site map
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li class="active">更新</li>
</ol>
';
//Display welcome message
//echo "<h1>This is update page</h1> ";

//This is choose update_date code   >>>>>>>>>>>step1
if (empty($_POST["date"]) && empty($_POST["routine_submit"]) ) {
	// echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='date_form'>";
	// require_once("date_form.php");
	// echo "<input type='submit'  name='date_submit' value='SubmitDate' />";
	// echo "</form>";

//Panel start      >>>>>>>>>>>>>>>>>>>>
	echo '
	<div class="panel panel-info">
		<div class="panel-heading">更新记录</div>
		<div class="panel-body">
			';

//Add contents start
			echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='date_form'>";
			require_once("date_form.php");
			echo '<div class="button_div"><button class="btn btn-default" type="submit" name="submit_date">提交</button></div>';
			echo "</form>";
//Add contents finish

			echo '
		</div>
	</div>';
//Panel end    <<<<<<<<<<<<<<<<<<<<<<<<

}

//This is input code         >>>>>>>>>>>>step2
elseif(empty($_POST["routine_submit"])){

	$date=$_POST["date"];
	$sql_checkdate="SELECT * FROM routine where date = '" . $date ."'";
	$result_of_date_check = $db->query($sql_checkdate);

	if ($result_of_date_check->num_rows == 0) {
		echo '<div class="well">';
		echo '<div class="alert alert-danger" role="alert"><strong>'.$date.'</strong> 的记录不存在！请核对选择的日期！</div>';
		$this_page=$_SERVER['PHP_SELF'];
		echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择</button></a>';
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
		echo '</div>';
	}
	else{
		// echo "date is $date";
		// echo "<form method='post' action='".$_SERVER['PHP_SELF']."?date=$date"."' name='routine_form'>";
		// echo "<table>
		// 	<tr>
		// 	<th>宿舍号</th>
		// 	<th>成绩</th>
		// 	<th>注释</th>
		// 	</tr>";
		// $sql="SELECT * FROM dorm";
		// $result = $db->query($sql);
		// $i = 0;
		// while($row = $result_of_date_check->fetch_array(MYSQLI_ASSOC)){
		// 	//per row define
		// 	echo "<tr>";
		// 	echo "<td><input type='text' value='" . $row['dorm_num'] . "' readonly /></td>";

		// 	//echo "<td>" .$row['score']."</td>" ;
		// 	//$row['score'] add to below require
		// 	echo "<td>";
		// 	require("droplist_display_value.php");
		// 	echo "</td>";

		// 	echo "<td>";
		// 	$comments=$row['comments'];
		// 	echo "<input type='text' name='comment" . "$i". "' value='$comments' required />";
		// 	echo "</td>";
		// 	echo "</tr>";

		// 	$i++;
		// }
		// echo "</table>";
		// echo "<input type='submit'  name='routine_submit' value='routine_Submit' />";
		// echo "</form>";

//panel start    >>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-info">
			<div class="panel-heading">您所选择的日期为：<strong class="text-danger">'.$date.'</strong></div>
			<div class="panel-body">
				';

//Add contents start
				echo "<form method='post' action='".$_SERVER['PHP_SELF']."?date=$date"."' name='routine_form' onsubmit='return validate_form(this)'>";
				echo "<table class='table'>
				<tr>
					<th>宿舍号</th>
					<th>备注</th>
					<th>成绩</th>
				</tr>";
				$sql="SELECT * FROM dorm";
				$result = $db->query($sql);
				$i = 0;
				while($row = $result_of_date_check->fetch_array(MYSQLI_ASSOC)){
				//per row define
				echo "<tr>";
				echo "<td><input type='text' value='" . $row['dorm_num'] . "' class='form-control' readonly /></td>";
				//comments
				echo "<td>";
				$comments=$row['comments'];
				echo "<input type='text' name='comment" . "$i". "' value='$comments' class='form-control' required />";
				echo "</td>";
				//echo "<td>" .$row['score']."</td>" ;
				//$row['score'] add to below require
				echo "<td>";
				require("droplist_display_value.php");
				echo "</td>";
				//per row end
				echo "</tr>";

				$i++;
				}
				echo "</table>";
				$this_page=$_SERVER['PHP_SELF'];
				echo '<button class="btn btn-danger float_right" type="submit"  name="routine_submit" value="routine_submit" >提交更新</button>';
				echo "</form>";
				//add js verify as below
				echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择日期</button></a>';
//Add contents finish

				echo '
			</div>
		</div>';
//panle end  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

//form verify start >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		$rows = $result->num_rows;
		echo '
<script type="text/javascript">
function validate_required(field,alerttxt)
{
	with (field)
	{
		if (value==null||value==""||value=="none")
			{alert(alerttxt);return false}
		else {return true}
	}
}
function validate_form(thisform)
{
	with (thisform)
	{
		';

for ($j=0; $j < $rows ; $j++) { 

	echo "
if (validate_required(comment$j,'请填入第".($j+1)."行的备注')==false)
				{comment$j.focus();return false}";	
	echo "
if (validate_required(score$j,'请填入第".($j+1)."行的成绩')==false)
				{score$j.focus();return false}";
}
			
echo '
	}
}
</script>
		';
//form verify end <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

	}
}
//This is post routine code       >>>>>>>>>>>step3
else{
	//var_dump($_POST);
	$sql_select="SELECT * FROM dorm";
	$result_select = $db->query($sql_select);
	$i = $result_select->num_rows;
	$date=$_GET["date"];
	//log
	$action="更新记录：".$date."";
	add_log($action,$db);


	for ($j=0; $j<$i; $j++) {	

		//	$date=date("Y.m.d")；
		$row = $result_select->fetch_array(MYSQLI_ASSOC);
		$b=$row['dorm_num'];
		$c="comment"."$j";
		$d="score"."$j";
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
		$sql_update="UPDATE routine SET  comments = '$cc' , score = '$dd' WHERE date = '$date' and dorm_num = '$b' ";
		$db->query($sql_update) or die($db->error);
	}
		//Display added
		// echo "Updated perfectly as below";
		// $sql_checkdate="SELECT * FROM routine where date = '" . $date ."'";
		// $result_of_date_check = $db->query($sql_checkdate);

		// if ($result_of_date_check->num_rows != 0) {
		// 	echo "<table class='table table-bordered'>";
		// 	$i = 0;
		// 	while($row = $result_of_date_check->fetch_array(MYSQLI_ASSOC)){
		// 		if($i == 0){
		// 			echo "<tr class='success'>";
		// 			foreach($row as $x=>$x_value) {
		// 				echo "<th>";
		// 				echo $x;
		// 				echo "</th>";
		// 			}
		// 			echo "</tr>";			
		// 		}
		// 		echo "<tr>";
		// 		foreach($row as $x=>$x_value) {
		// 			echo "<td>" .$x_value."</td>" ;
		// 		}
		// 		echo "</tr>";
		// 		$i=1;
		// 	}
		// } 

//Panel begin >>>>>>>>>>>>>>>>>>>>
	echo '
	<div class="panel panel-success">
		<div class="panel-heading"><strong>'.$date.'的记录更新成功！</strong>如下表格所示：</div>
		<div class="panel-body"  id="dvData">
			';

//Add contents start
			$sql_checkdate="SELECT * FROM routine where date = '" . $date ."'";
			$result_of_date_check = $db->query($sql_checkdate);
			if ($result_of_date_check->num_rows != 0) {
				echo "<table class='table table-bordered'>
				<tr>
					<th>日期</th>
					<th>宿舍号</th>
					<th>注释</th>
					<th>成绩</th>			
				</tr>";
				while($row = $result_of_date_check->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>";
					foreach($row as $x=>$x_value) {
						echo "<td>" .$x_value."</td>" ;
					}
					echo "</tr>";
				}
			}
			echo "</table>";
			$this_page=$_SERVER['PHP_SELF'];
			echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
			//echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续更新</a>';		
			echo '<a href="index.php"class="btn btn-default float_right">返回主面板</a>';
			echo "</form>";	
//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<

//include export js 
$filename=$date;
require_once("export.php");

}
















require_once("footer.php");
?>
