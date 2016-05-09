<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
check_permission($level_del);
//site map
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li class="active">删除</li>
</ol>
';
//Display welcome message
//echo "<h1>This is add page</h1> ";

//This is input code         >>>>>>>>>>>>step2
if(isset($_POST["view_del_submit"])){


	$floor_sum=$_POST["view_del_submit"];
	// echo gettype($floor_sum), "\n";
	$floor_sum=$floor_sum+0;
	// echo gettype($floor_sum), "\n";
	//echo "$floor_sum";
	//var_dump($_POST);


	$date=$_POST["date"];
	$region=$_POST["region"];
	$build_num=$_POST["build_num"];
	$part=$_POST["part"];
	$floor=$_POST["floor"];



	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}
	// else{
	// 	die();
	// }

	//$sql_checkdate="SELECT * FROM routine_list where date = '" . $date ."'";
	$sql_check="SELECT * FROM dorm,routine_list WHERE routine_list.date='$date' and dorm.region = '$region' and dorm.build_num = '$build_num' and dorm.part = '$part' and dorm.floor = '$floor' and dorm.dorm_num=routine_list.dorm_num ";
	$result_of_check = $db->query($sql_check) or die($db->error);

	if ($result_of_check->num_rows != 0) {
		//echo "result_checkdate is $result_of_date_check->num_rows <br />";

		echo '
		<div class="panel panel-danger">
			<div class="panel-heading">日期为 <strong>'.$date.'</strong> ，楼层为 <strong>'.$region.$build_num.'#'.$part.'区'.$floor.'层</strong>， 所选择的 宿舍如下表所示，您确认要删除吗？此操作 <strong>不可逆！</strong></div>
			<div class="panel-body">
				';

	echo "<table class='table' id='table_adding'>
	<tr>
		<th>检查日期</th>
		<th>宿舍号</th>
		<th>阳台&卫生间</th>
		<th>床铺</th>
		<th>桌柜</th>
		<th>地面</th>
		<th>安全</th>
		<th>总分</th>
		<th>备注</th>		
		<th>学生处</th>
	</tr>";

	$i=0;//i means deleted entry count
	$dorm_num_sum="";

	//>>>>>>>>>>>>>>>>>>>> form begin >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	echo "<form method='post' action='".$_SERVER['PHP_SELF']."?date=$date"."' name='routine_del_form'>";

	for ($k=0; $k < $floor_sum ; $k++) { 
		$dorm_check_k="dorm_check".$k;
		if (isset($_POST[$dorm_check_k])) {
			//echo $dorm_check_k."&nbsp;&nbsp;";
			$dorm_num=$_POST["$dorm_check_k"];		
			//echo $dorm_num."<br />";
			$dorm_num_sum=$dorm_num_sum." ".$dorm_num;  

			echo "<input name = 'dorm_num$i' value = '$dorm_num' style='display: none;' />";

			$sql="SELECT * FROM routine_list WHERE dorm_num = '$dorm_num' and date = '$date' " ;
			$result= $db->query($sql) or die($db->error);
			$row = $result->fetch_array(MYSQLI_ASSOC);

					echo "<tr>";

						echo "<td>" .$row['date']."</td>" ;
						echo "<td>" .$row['dorm_num']."</td>" ;
						echo "<td>" .$row['wc_balcony']."</td>" ;
						echo "<td>" .$row['bed']."</td>" ;
						echo "<td>" .$row['desk_cupboard']."</td>" ;
						echo "<td>" .$row['ground']."</td>" ;
						echo "<td>" .$row['security']."</td>" ;
						echo "<td>" .$row['score']."</td>" ;
						echo "<td>" .$row['comments']."</td>" ;
						echo "<td>" .$row['score_t']."</td>" ;


					echo "</tr>";

			$i++;
		}
	}
	echo "</table>";
				
	echo '<button class="btn btn-danger float_right" type="submit"  name="add_step2" value="add_step2" >确认删除</button>';
	echo "<input name = 'add_floor' value = '$add_floor' style='display: none;' />";
	echo "<input name = 'date' value = '$date' style='display: none;' />";
	echo "<input name = 'entry_count' value = '$i' style='display: none;' />";
	echo "<input name = 'dorm_num_sum' value = '$dorm_num_sum' style='display: none;' />";
	echo "</form>";
	//<<<<<<<<<<<<<<<<<<<<<<< form end <<<<<<<<<<<<<<<<<<<<<<<<<

				echo '
			</div>
		</div>';

	}

	// else{
	// 	echo '<div class="well">';
	// 	echo '<div class="alert alert-danger" role="alert">
	// 	日期为<strong>'.$date.'</strong> ，楼层为<strong>'.$region.$build_num.'#'.$part.'区'.$floor.'层</strong>的记录 <strong>不存在！</strong></div>';
	// 	$this_page=$_SERVER['PHP_SELF'];
	// 	echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择</button></a>';
	// 	echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
	// 	echo '</div>';
	// 	}
}

//This is post routine code       >>>>>>>>>>>step3
elseif(isset($_POST["add_step2"])){
	//var_dump($_POST);


	$date=$_POST["date"];
	$i=$_POST["entry_count"];
	$add_floor=$_POST["add_floor"];
	$dorm_num_sum=$_POST["dorm_num_sum"];

	//routine_add
	$add_time=date("Y-m-d  H:i:s");
	$user_name=$_SESSION['user_name'];
	$routine_add_action="del";
	$sql_insert="INSERT INTO routine_add(date,add_floor,add_time,user_name,routine_add_action,dorm_num_sum) VALUES ('$date','$add_floor','$add_time','$user_name','$routine_add_action','$dorm_num_sum')";
	$db->query($sql_insert) or die($db->error);

	//var_dump($_POST);
	//echo "<br />";
	//echo "<br />";
	// var_dump($_SESSION);
	// echo "<br />";
	// echo "<br />";
	// var_dump($_SERVER);
	// echo "<br />";
	// echo "<br />";

	//$dorm_num_sum="";

	for ($j=0; $j < $i ; $j++) { 
		$dorm_num=$_POST["dorm_num"."$j"];
		//echo $dorm_num;
		/*$dorm_num_sum=$dorm_num_sum." ".$dorm_num;*/
		$sql_delete="DELETE FROM routine_list WHERE dorm_num = '$dorm_num' and date = '$date' ";
		$db->query($sql_delete) or die($db->error);
	}






	// $sql="DELETE FROM routine_add WHERE add_floor = '$add_floor' ";
	// $db->query($sql) or die($db->error);

	











	//log
	$action="删除记录, 检查日期：".$date." , 楼层：".$add_floor ." 宿舍：".$dorm_num_sum;
	add_log($action,$db);

		echo '<div class="well">';
			echo '<div class="alert alert-success" role="alert">
		日期为<strong class="text-danger">'.$date.'</strong>, 宿舍 <strong class="text-danger">'.$dorm_num_sum.'</strong>的记录已删除！</div>';
			$this_page=$_SERVER['PHP_SELF'];
			//echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
			//echo '<a class="btn btn-default" href="'.$this_page.'">继续删除</a>';		
			echo '<a href="index.php" class="btn btn-default">返回主面板</a>';
		echo '</div>';

}













?>
<?php
require_once("footer.php");
?>

