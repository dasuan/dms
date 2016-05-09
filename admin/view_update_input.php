<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php");
check_permission($level_add);
//site map
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li><a href="view_add.php">修改</a></li>
	<li class="active">修改选定宿舍</li>
</ol>
';
//Display welcome message
//echo "<h1>This is add page</h1> ";

//This is input code         >>>>>>>>>>>>step2
if(isset($_POST["view_update_submit"])){

	$floor_sum=$_POST["view_update_submit"];

	// echo gettype($floor_sum), "\n";
	$floor_sum=$floor_sum+0;
	// echo gettype($floor_sum), "\n";
	//echo "$floor_sum";
	//var_dump($_POST);
$judge=0;
for ($k=0; $k < $floor_sum ; $k++) { 
		$dorm_check_k="dorm_check".$k;		
		if (isset($_POST[$dorm_check_k])) {
			$judge++;
		}

}
if($judge==0){
	die(你没有选择宿舍);
}


	//echo $floor_sum;

	$date=$_POST["date"];
	$region=$_POST["region"];
	$build_num=$_POST["build_num"];
	$part=$_POST["part"];
	$floor=$_POST["floor"];
	$add_floor=$_POST["add_floor"];

	echo'		<div class="panel panel-info">
				<div class="panel-heading">
					您选择的检查日期为：
					<strong class="text-danger">'.$date.'</strong>
					宿舍号如下：
				</div>
				<div class="panel-body">';
	$this_page=$_SERVER['PHP_SELF'];				
	echo "<form method='post' action='$this_page' name='routine_form'  onsubmit='return validate_form(this)' >";
	echo "<table class='table' id='table_adding'>
	<tr>
		<th>宿舍号</th>
		<th>阳卫</th>
		<th>床铺</th>
		<th>桌柜</th>
		<th>地面</th>
		<th>安全</th>
		
		<th>总分</th>
		<th>备注</th>

		<th>学生处</th>
	</tr>";
	$i=0;
	$dorm_num_sum="";
	for ($k=0; $k < $floor_sum ; $k++) { 
		$dorm_check_k="dorm_check".$k;

		
		if (isset($_POST[$dorm_check_k])) {
			//echo $dorm_check_k."&nbsp;&nbsp;";
			$dorm_num=$_POST["$dorm_check_k"];		
			//echo $dorm_num."<br />";
			$dorm_num_sum=$dorm_num_sum." ".$dorm_num;

			// get added record
			$sql_dorm="SELECT * FROM routine_list WHERE dorm_num='$dorm_num' and date = '$date'";
            $result_dorm= $db->query($sql_dorm);
            $row_dorm = $result_dorm->fetch_array(MYSQLI_ASSOC);

            $comments = $row_dorm['comments'];
            $score = $row_dorm['score'];
            $score_t = $row_dorm['score_t'];

            $a=$row_dorm["wc_balcony"];
			$b=$row_dorm["bed"];
			$c=$row_dorm["desk_cupboard"];
			$d=$row_dorm["ground"];
			$e=$row_dorm["security"];


			//per row define
			echo "<tr>";
					//dorm_num
			echo "<td><input name='dorm_num$i' class='form-control' type='text' value='" . $dorm_num. "' readonly /></td>";
					//wc_balcony
			echo "<td>";
			drop_list_20_added("wc_balcony",$i,$a);
			echo "</td>";
							//bed
			echo "<td>";
			drop_list_20_added("bed",$i,$b);
			echo "</td>";
							//desk_cupboard
			echo "<td>";
			drop_list_20_added("desk_cupboard",$i,$c);
			echo "</td>";
							//ground
			echo "<td>";
			drop_list_20_added("ground",$i,$d);
			echo "</td>";
							//security
			echo "<td>";
			drop_list_20_added("security",$i,$e);
			echo "</td>";
							
							//score
			echo "<td>";
			echo "<input type='text' name='score" . "$i". "' id='score" . "$i". "' class='form-control' value='$score' required style='width:50px;' />";
			echo "</td>";

			//comment
			echo "<td>";
			echo "<input type='text' name='comments" . "$i". "' class='form-control' value='$comments' />";
			echo "</td>";
			
							//score_t
			echo "<td>";
			echo "<input type='text' name='score_t" . "$i". "' id='score_t" . "$i". "' class='form-control' value='$score_t' required style='width:50px;' />";
			echo "</td>";

							//per row end
			echo "</tr>";
			$i++;
		}

	}

	echo "</table>";

	//$this_page=$_SERVER['PHP_SELF'];

	echo "<input name = 'date' value = '$date' style='display: none;' />";
	echo "<input name = 'region' value = '$region' style='display: none;' />";
	echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
	echo "<input name = 'part' value = '$part' style='display: none;' />";
	echo "<input name = 'floor' value = '$floor' style='display: none;' />";
	echo "<input name = 'add_floor' value = '".$region."$build_num"."#"."$part"."区"."$floor"."层' style='display: none;' />";
	echo "<input name = 'entry_count' value = '$i' style='display: none;' />";
	echo "<input name = 'dorm_num_sum' value = '$dorm_num_sum' style='display: none;' />";
	


	echo '<button class="btn btn-danger float_right" type="submit"  name="add_step2" value="add_step2" >提交</button>';



						// $region=$_POST["region"];
						// 	$build_num=$_POST["build_num"];
						// 	$part=$_POST["part"];
						// 	$floor=$_POST["floor"];


	echo "</form>";
	echo '<button class="btn text-info float_right" onclick="score_sum()">生成总分</button>';
	require_once("score_sum_js.php");
	echo '<a href="view_add.php"><button class="btn btn-default">重新选择日期</button></a>';
				//Add contents finish

	echo '
</div>
</div>';
	//panle end  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

	//form verify start >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$rows = $i;
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
							/*
							echo "
							if (validate_required(comment$j,'请填入第".($j+1)."行的备注')==false)
								{comment$j.focus();return false}";	
							*/
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

// 	//table head ceiling>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	// 				echo '
	// 				<style>
	// 					.second{
	// 						width:77.5%;
	// 						height:37px;
	// 						border-color: rgb(198, 198, 198);
	// 						background-color: rgb(238, 238, 238);
	// 						background-image: -o-linear-gradient(to bottom, rgb(248, 248, 248) 0px, rgb(238, 238, 238) 100%);
	// 						background-image: linear-gradient(to bottom, rgb(248, 248, 248) 0px, rgb(238, 238, 238) 100%);
	// 						background-image: -webkit-gradient(linear, 0 0, 0 bottom, from(rgb(248, 248, 248)), to(rgb(238, 238, 238)));
	// 					}
	// 					.pad_left_15{
	// 						padding-left: 15px;
	// 					}           
	// 				</style>

	// 				<script type="text/javascript">
	// 					/**
	// 			            * 网页加载完毕后，确定各div的位置
	// 			            */
	// 					$(document).ready(function(){
	// 						floatdiv();
	// 					});
	// 					/**
	// 			            * 网页滚动时，确定各div的位置
	// 			            */
	// 					$(window).scroll(function(){
	// 						floatdiv();
	// 					});
	// 					/**
	// 			            * div浮动函数
	// 			            */
	// 					function floatdiv(){
	// 						var scrollTop = $(this).scrollTop();
	// 						/*查找class=second 的元素，调整css*/
	// 						if (scrollTop > 180) {
	// 							$(".second").css({
	// 								"visibility" : "visible",
	// 								"position" : "fixed",
	// 								"top"      : "50px",
	// 								"left"     : "19.5%",
	// 								"z-index"  : "999"
									
	// 							});

	// 						} else {
	// 							$(".second").css({
	// 								"visibility" : "hidden",
	// 								"position" : "static"
									
	// 							});

	// 						}
	// 					}

	// 					window.onscroll = function() { 
	// 						console.info(window.scrollY); 
	// 					} 

	// 				</script>

	// 				<div class="second panel pad_left_15">
	// 					<table class="table">
	// 						<tr>
	// 							<th>宿舍号</th>
	// 							<th>阳台&卫生间</th>
	// 							<th>床铺</th>
	// 							<th>桌柜</th>
	// 							<th>地面</th>
	// 							<th>安全</th>
	// 							<th>备注</th>
	// 							<th>总分</th>
	// 						</tr>
	// 						<tr style="visibility:hidden;"><td><input name="dorm_num0" class="form-control" type="text" value="南10#601" readonly=""></td><td><select name="wc_balcony0" id="wc_balcony0" class="form-control">
	// 							<option value="20" selected="selected">20</option>
	// 							<option value="15">15</option>
	// 							<option value="10">10</option>
	// 							<option value="5">5</option>
	// 							<option value="0">0</option>
	// 						</select>
	// 					</td><td><select name="bed0" id="bed0" class="form-control">
	// 					<option value="20" selected="selected">20</option>
	// 					<option value="15">15</option>
	// 					<option value="10">10</option>
	// 					<option value="5">5</option>
	// 					<option value="0">0</option>
	// 				</select>
	// 			</td><td><select name="desk_cupboard0" id="desk_cupboard0" class="form-control">
	// 			<option value="20" selected="selected">20</option>
	// 			<option value="15">15</option>
	// 			<option value="10">10</option>
	// 			<option value="5">5</option>
	// 			<option value="0">0</option>
	// 		</select>
	// 	</td><td><select name="ground0" id="ground0" class="form-control">
	// 	<option value="20" selected="selected">20</option>
	// 	<option value="15">15</option>
	// 	<option value="10">10</option>
	// 	<option value="5">5</option>
	// 	<option value="0">0</option>
	// </select>
	// </td><td><select name="security0" id="security0" class="form-control">
	// <option value="20" selected="selected">20</option>
	// <option value="15">15</option>
	// <option value="10">10</option>
	// <option value="5">5</option>
	// <option value="0">0</option>
	// </select>
	// </td><td><input type="text" name="comments0" class="form-control"></td><td><input type="text" name="score0" id="score0" class="form-control" required=""></td></tr>
	// </table>
	// </div> 
	// ';
	// 	//table head ceiling<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

}
elseif(isset($_POST["add_step2"])){
	//var_dump($_POST);

	$date=$_POST["date"];
	$i=$_POST["entry_count"];
	$add_floor=$_POST["add_floor"];
	$dorm_num_sum=$_POST["dorm_num_sum"];
	//echo $dorm_num_sum;

	//routine_add
	$add_time=date("Y-m-d  H:i:s");
	$user_name=$_SESSION['user_name'];
	$routine_add_action="update";
	$sql_insert="INSERT INTO routine_add(date,add_floor,add_time,user_name,routine_add_action,dorm_num_sum) VALUES ('$date','$add_floor','$add_time','$user_name','$routine_add_action','$dorm_num_sum')";
	$db->query($sql_insert) or die($db->error);
	//log
	$action="更新记录, 日期：".$date." , 楼层：".$add_floor ." 宿舍：".$dorm_num_sum;
	add_log($action,$db);


	for ($j=0; $j<$i; $j++) {	

		//	$date=date("Y.m.d")；

		$dorm_num=$_POST["dorm_num"."$j"];

		$a=$_POST["wc_balcony"."$j"];
		$b=$_POST["bed"."$j"];
		$c=$_POST["desk_cupboard"."$j"];
		$d=$_POST["ground"."$j"];
		$e=$_POST["security"."$j"];

		$comments=$_POST["comments"."$j"];
		$score=$_POST["score"."$j"];
		$score_t=$_POST["score_t"."$j"];


	//routine_list insert
	//	$sql_insert="INSERT INTO routine_list(user_name,date, dorm_num,add_floor,wc_balcony,bed,desk_cupboard,ground,security, comments, score, score_t) VALUES ('$user_name','$date','$dorm_num','$add_floor','$a','$b','$c','$d','$e','$comments','$score','$score_t')";
		$sql_insert="UPDATE routine_list SET user_name = '$user_name',date = '$date', dorm_num= '$dorm_num',add_floor = '$add_floor' ,wc_balcony = '$a',bed = '$b',desk_cupboard = '$c',ground = '$d',security = '$e', comments = '$comments', score = '$score', score_t = '$score_t' WHERE dorm_num='$dorm_num' and date = '$date' ";

		$db->query($sql_insert) or die($db->error);
	}
	//Display added

	//Panel begin >>>>>>>>>>>>>>>>>>>>
	echo '
	<div class="panel panel-success">
		<div class="panel-heading"><strong>修改成功！</strong>如下表格所示：</div>
		<div class="panel-body"  id="dvData">
			';

	//Add contents start
			$sql="SELECT * FROM routine_list where date = '" . $date ."' and add_floor = '".$add_floor."' " ;
			$result= $db->query($sql) or die($db->error);
			if ($result->num_rows != 0) {
				echo "<table class='table table-bordered'>
				<tr>
					<th>检查日期</th>
					<th>宿舍号</th>
					<th>阳卫</th>
					<th>床铺</th>
					<th>桌柜</th>
					<th>地面</th>
					<th>安全</th>
					<th>总分</th>
					<th>备注</th>
					<th>学生处</th>			
				</tr>";

				for ($j=0; $j<$i; $j++) {

				
				$dorm_num=$_POST["dorm_num"."$j"];
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

				}
			}
			echo "</table>";
			$this_page=$_SERVER['PHP_SELF'];
			echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
		//echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续添加</a>';		
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




	


?>



















<?php
require_once("footer.php");
?>

