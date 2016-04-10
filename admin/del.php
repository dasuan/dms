<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php");
check_permission(3);
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
if(isset($_POST["add_step1"])){

	$date=$_POST["date"];
	$region=$_POST["region"];
	$build_num=$_POST["build_num"];
	$part=$_POST["part"];
	$floor=$_POST["floor"];

	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	// }else{
	// 	die();
	// }

	//$sql_checkdate="SELECT * FROM routine_list where date = '" . $date ."'";
	$sql_check="SELECT * FROM dorm,routine_list WHERE routine_list.date='$date' and dorm.region = '$region' and dorm.build_num = '$build_num' and dorm.part = '$part' and dorm.floor = '$floor' and dorm.dorm_num=routine_list.dorm_num ";
	$result_of_check = $db->query($sql_check);

	if ($result_of_check->num_rows != 0) {
		//echo "result_checkdate is $result_of_date_check->num_rows <br />";

		echo '
		<div class="panel panel-danger">
			<div class="panel-heading">日期为<strong>'.$date.'</strong> ，楼层为<strong>'.$region.$build_num.'#'.$part.'区'.$floor.'层</strong>的记录如下表所示，您确认要删除吗？此操作不可逆！</div>
			<div class="panel-body">
				';

			//Add contents start
			$add_floor=$region."$build_num"."#"."$part"."区"."$floor"."层";
			$sql="SELECT * FROM routine_list where date = '" . $date ."' and add_floor = '".$add_floor."' " ;
			$result= $db->query($sql);
			if ($result->num_rows != 0) {
				echo "<table class='table table-bordered'>
				<tr>
					<th>检查日期</th>
					<th>宿舍号</th>
					<th>阳台&卫生间</th>
					<th>床铺</th>
					<th>桌柜</th>
					<th>地面</th>
					<th>安全</th>
					<th>备注</th>
					<th>总分</th>			
				</tr>";
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>";

						echo "<td>" .$row['date']."</td>" ;
						echo "<td>" .$row['dorm_num']."</td>" ;
						echo "<td>" .$row['wc_balcony']."</td>" ;
						echo "<td>" .$row['bed']."</td>" ;
						echo "<td>" .$row['desk_cupboard']."</td>" ;
						echo "<td>" .$row['ground']."</td>" ;
						echo "<td>" .$row['security']."</td>" ;
						echo "<td>" .$row['comments']."</td>" ;
						echo "<td>" .$row['score']."</td>" ;

					echo "</tr>";
				}
			}

				echo "</table>";
				echo "<form method='post' action='".$_SERVER['PHP_SELF']."?date=$date"."' name='routine_del_form'>";
				echo '<button class="btn btn-danger float_right" type="submit"  name="add_step2" value="add_step2" >确认删除</button>';
				echo "<input name = 'add_floor' value = '$add_floor' style='display: none;' />";
				echo "<input name = 'date' value = '$date' style='display: none;' />";
				echo "</form>";
				//Add contents finish

				echo '
			</div>
		</div>';

	}

	else{
		echo '<div class="well">';
		echo '<div class="alert alert-danger" role="alert">
		日期为<strong>'.$date.'</strong> ，楼层为<strong>'.$region.$build_num.'#'.$part.'区'.$floor.'层</strong>的记录 <strong>不存在！</strong></div>';
		$this_page=$_SERVER['PHP_SELF'];
		echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择</button></a>';
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
		echo '</div>';
		}
}

//This is post routine code       >>>>>>>>>>>step3
elseif(isset($_POST["add_step2"])){
	//var_dump($_POST);

	$date=$_POST["date"];
	$i=$_POST["entry_count"];
	$add_floor=$_POST["add_floor"];



	//routine_add
	$add_time=date("Y-m-d  H:i:s");
	$user_name=$_SESSION['user_name'];

	$sql_delete="DELETE FROM routine_add WHERE add_floor = '$add_floor' ";
	$db->query($sql_delete) or die($db->error);

	$sql_delete="DELETE FROM routine_list WHERE add_floor = '$add_floor'";
	$db->query($sql_delete) or die($db->error);
	//log
	$action="删除记录, 检查日期：".$date." , 楼层：".$add_floor;
	add_log($action,$db);

		echo '<div class="well">';
			echo '<div class="alert alert-success" role="alert">
		日期为<strong>'.$date.'</strong> ，楼层为<strong>'.$add_floor.'</strong>的记录已删除！</div>';
			$this_page=$_SERVER['PHP_SELF'];
			//echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
			echo '<a class="btn btn-default" href="'.$this_page.'">继续删除</a>';		
			echo '<a href="index.php" class="btn btn-default float_right">返回主面板</a>';
		echo '</div>';
}


//This is choose condition code   >>>>>>>>>>>step1
else{


	//Panel start      >>>>>>>>>>>>>>>>>>>>
	echo '
	<div class="panel panel-info">
		<div class="panel-heading">删除记录</div>
		<div class="panel-body">
			';

	//Add contents start
			echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='date_form'>";
			require_once("date_form.php");
			echo '
			<select name="region" onchange="f_region(this.value)" id="region" class="form-control drop_list_add" required>
				<option value="" selected="selected">请选择地区</option> 
				<option value="1">南苑</option>
				<option value="2">北苑</option>
			</select>
			<select name="build_num" onchange="f_build_num(this.value)" id="build_num" class="form-control drop_list_add" required>
				<option value="" selected="selected">请选择楼号</option> 
			</select>
			<select name="part" onchange="f_part(this.value)" id="part" class="form-control drop_list_add" required>
				<option value="" selected="selected">请选择ab区</option> 
			</select>
			<select name="floor" onchange="" id="floor" class="form-control drop_list_add" required>
				<option value="" selected="selected">请选择楼层</option> 
			</select>
			<div class="button_div"><button class="btn btn-default btn_add" type="submit" name="add_step1" value="add_step1">提交</button></div>
			';
			echo "</form>";
			require_once("add_js.php");
	//Add contents finish

			echo '
		</div>
	</div>';
	//Panel end    <<<<<<<<<<<<<<<<<<<<<<<<
}











?>
<?php
require_once("footer.php");
?>

