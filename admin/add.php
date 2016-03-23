<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
//site map
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li class="active">添加</li>
</ol>
';
//Display welcome message
//echo "<h1>This is add page</h1> ";

//This is choose date code   >>>>>>>>>>>step1
if (empty($_POST["date"]) && empty($_POST["routine_submit"]) ) {
//Panel start      >>>>>>>>>>>>>>>>>>>>
	echo '
	<div class="panel panel-info">
		<div class="panel-heading">添加记录</div>
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

	if ($result_of_date_check->num_rows != 0) {
		//echo "result_checkdate is $result_of_date_check->num_rows <br />";

		echo '
		<div class="panel panel-danger">
			<div class="panel-heading"><strong>'.$date.' 的记录已存在！请检查您选择的日期！</strong> 如下表所示：</div>
			<div class="panel-body">
				';

//Add contents start
				echo "<table class='table table-bordered'>
				<tr>
					<th>日期</th>
					<th>宿舍号</th>
					<th>成绩</th>
					<th>备注</th>
				</tr>";
				while($row = $result_of_date_check->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>";
					foreach($row as $x=>$x_value) {
						echo "<td>" .$x_value."</td>" ;
					}
					echo "</tr>";

				}
				echo "<table>";
				$this_page=$_SERVER['PHP_SELF'];
				echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择</button></a>';
				echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';

//Add contents finish

				echo '
			</div>
		</div>';



	}

	else{
//panel start    >>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-info">
			<div class="panel-heading">您所选择的日期为：<strong class="text-danger">'.$date.'</strong></div>
			<div class="panel-body">
				';

//Add contents start
				echo "<form method='post' action='".$_SERVER['PHP_SELF']."?date=$date"."' name='routine_form'>";
				echo "<table class='table'>
				<tr>
					<th>宿舍号</th>
					<th>成绩</th>
					<th>注释</th>
				</tr>";
				$sql="SELECT * FROM dorm";
				$result = $db->query($sql);
				$i = 0;
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
			//per row define
					echo "<tr>";
					echo "<td><input class='form-control' type='text' value='" . $row['dorm_num'] . "' readonly /></td>";
					echo "<td>";
					require("droplist.php");
					echo "</td>";
					echo "<td>";
					echo "<input type='text' name='comment" . "$i". "' class='form-control' required />";
					echo "</td>";
					echo "</tr>";
					$i++;
				}
				echo "</table>";
				$this_page=$_SERVER['PHP_SELF'];
				echo '<button class="btn btn-danger add_button" type="submit"  name="routine_submit" value="routine_submit">提交</button>';
				echo '<a href="$this_page"><button class="btn btn-default">重新选择日期</button></a>';
				echo "</form>";
//Add contents finish

				echo '
			</div>
		</div>';
//panle end  >>>>>>>>>>>>>>>>>>
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

		$sql_insert="INSERT INTO routine(date, dorm_num, score,comments) VALUES ('$date','$b','$cc','$dd')";
		$db->query($sql_insert) or die($db->error);
	}
		//Display added

//Panel begin >>>>>>>>>>>>>>>>>>>>
	echo '
	<div class="panel panel-success">
		<div class="panel-heading"><strong>添加成功！</strong>如下表格所示：</div>
		<div class="panel-body">
			';

//Add contents start
			$sql_checkdate="SELECT * FROM routine where date = '" . $date ."'";
			$result_of_date_check = $db->query($sql_checkdate);
			if ($result_of_date_check->num_rows != 0) {
				echo "<table class='table'>
				<tr>
					<th>日期</th>
					<th>宿舍号</th>
					<th>成绩</th>
					<th>注释</th>
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
			echo '<button class="btn btn-default" name="export_table">导出表格</button>';
			echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
			echo "</form>";
//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<













}













?>


<?php
require_once("footer.php");
?>

