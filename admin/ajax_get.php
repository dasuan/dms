<?php
require_once("auth.php"); // verify whether login
require_once("db_connection.php");




if($_GET["step"]=="1"){
	$region=$_GET["region"];
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
		if ($row['build_num']==0) {
			echo "<option value='".$row['build_num']."'>" . "不住宿" . "</option>";
		}else{
		echo "<option value='".$row['build_num']."'>" . $row['build_num'] . "号楼</option>";
		}	
	}

}elseif ($_GET["step"]=="2") {
	$build_num=$_GET["build_num"];
	$region=$_GET["region"];
	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}else{
		die();
	}
	echo '<option value="" selected="selected">请选择AB区</option>';
	$sql="SELECT DISTINCT part FROM dorm WHERE build_num = '".$build_num."' and region = '".$region."'";
	$result = $db->query($sql);
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		if ($row['part']==0) {
			//echo "<option value='".$row['part']."'>" . "此楼不分AB区" . "</option>";
			echo "<option value='".$row['part']."'>" . "此楼不分AB区" . "</option>";
		}else{
		echo "<option value='".$row['part']."'>" . $row['part'] . "区</option>";
		}
	}
}elseif ($_GET["step"]=="3") {
	$region=$_GET["region"];
	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}else{
		die("不住宿");
	}
	$build_num=$_GET["build_num"];
	$part=$_GET["part"];
	echo '<option value="" selected="selected">请选择楼层</option>';
	$sql="SELECT DISTINCT floor FROM dorm WHERE build_num = '".$build_num."' and region = '".$region."' and part = '".$part."'";
	$result = $db->query($sql);
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value='".$row['floor']."'>" . $row['floor'] . "层</option>";
	}
}
/*
echo '
<!--This is for check box-->
<link href="css/bootstrap-switch.min.css" rel="stylesheet">
<script src="js/bootstrap-switch.min.js"></script>
<script>
$(function(argument) {
  $(\'[type="checkbox"]\').bootstrapSwitch();
 $(document).ajaxComplete(function(event, xhr, settings) {
      $(\'[type="checkbox"]\').bootstrapSwitch();
   });
})
</script>
';*/



//>>>>>>>>>>>>>>>>>>>View Display Code Here>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


elseif ($_GET["view_display_step"]=="1") {

	$date=$_GET["date"];
	//echo $date;
echo '<p>您选择的日期为：<strong class="text-danger">'.$date.'</strong>  &nbsp;&nbsp;   <strong class="bg-success text-success">绿色</strong>代表有记录 (<strong>0区</strong>代表此楼不分AB区)</p> ';
echo '<hr />';



$sql_region="SELECT DISTINCT region FROM dorm";
$result_region= $db->query($sql_region);

while($row_region = $result_region->fetch_array(MYSQLI_ASSOC)){
    //echo $row_region['region'];
    $region = $row_region['region'];

    $sql_build_num="SELECT DISTINCT build_num FROM dorm WHERE region = '$region' ORDER BY build_num ASC";
    $result_build_num= $db->query($sql_build_num);
    while($row_build_num = $result_build_num->fetch_array(MYSQLI_ASSOC)){
        //echo $row_build_num['build_num'];
        $build_num = $row_build_num['build_num'];


        $sql_part="SELECT DISTINCT part FROM dorm WHERE build_num = '$build_num' and region = '$region'";
        $result_part= $db->query($sql_part);
        while($row_part = $result_part->fetch_array(MYSQLI_ASSOC)){
            //echo $row_part['part'];
            $part = $row_part['part'];

        echo '<table class="table table-bordered _responsive-utilities build_model" >
            <tr><th>'.$build_num.'号楼'.$part.'区</th></tr>';
            

            $sql_floor="SELECT DISTINCT floor FROM dorm WHERE part = '$part' and build_num = '$build_num' and region = '$region' ORDER BY floor DESC";
            $result_floor= $db->query($sql_floor);
            while($row_floor = $result_floor->fetch_array(MYSQLI_ASSOC)){
                //echo $row_floor['floor'];
                $floor = $row_floor['floor'];

                $this_floor=$region."$build_num"."#"."$part"."区"."$floor"."层";
                $sql_check="SELECT * FROM routine_list WHERE add_floor = '$this_floor' and date = '$date'";
                $result_of_check = $db->query($sql_check);
                if ($result_of_check->num_rows != 0){
                    echo '<tr><td class="is_green">';
					$str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
					echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-success' value = '$str' style='width: 100%;' onclick='view_display(this.value)'>".$floor."层</button></a>";
					                  
                    echo '</td></tr>';
                }else{
                    echo '<tr><td class="is_gray">';

					$str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
					//echo "<p>$str</p>";
					//echo "<p>$this_floor</p>";
					//$str="bbbbbbbbbbbb";
					echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-default' value = '$str' style='width: 100%;' onclick='view_display(this.value)'>".$floor."层</button></a>";
					
                    
                    echo '</td></tr>';
                }


               
            }
        echo '</table>';
        }
    }
}
echo '
    </div>
</div>

<style type="text/css">
td.is_green {
    color: #468847;
    background-color: #dff0d8!important;
}                       
td.is_gray {
    color: #ccc;
    background-color: #f9f9f9!important;
}
.build_model{
    width: 100px ;
    /*float: left;*/
    vertical-align: bottom;
    display: inline-table;
    /* ie6/7 */
    *display: inline;
    zoom: 1;
    margin-left:10px;
}

.build_model_container{

}
</style>
';

//comment begin
	// echo '
	// <!--This is for check box-->
	// <link href="css/bootstrap-switch.min.css" rel="stylesheet">
	// <script src="js/bootstrap-switch.min.js"></script>
	// <script>
	// $(function(argument) {
	//   $(\'[type="checkbox"]\').bootstrapSwitch();
	//  $(document).ajaxComplete(function(event, xhr, settings) {
	//       $(\'[type="checkbox"]\').bootstrapSwitch();
	//    });
	// })
	// </script>
	// ';








	// $sql_region="SELECT DISTINCT region FROM dorm";
	// $result_region= $db->query($sql_region);

	// while($row_region = $result_region->fetch_array(MYSQLI_ASSOC)){
	//     //echo $row_region['region'];
	//     $region = $row_region['region'];

	//     $sql_build_num="SELECT DISTINCT build_num FROM dorm WHERE region = '$region' ORDER BY build_num ASC";
	//     $result_build_num= $db->query($sql_build_num);
	//     while($row_build_num = $result_build_num->fetch_array(MYSQLI_ASSOC)){
	//         //echo $row_build_num['build_num'];
	//         $build_num = $row_build_num['build_num'];


	//         $sql_part="SELECT DISTINCT part FROM dorm WHERE build_num = '$build_num' and region = '$region'";
	//         $result_part= $db->query($sql_part);
	//         while($row_part = $result_part->fetch_array(MYSQLI_ASSOC)){
	//             //echo $row_part['part'];
	//             $part = $row_part['part'];

	//         echo '<table class="table table-bordered _responsive-utilities build_model" >
	//             <tr><th>'.$build_num.'号楼'.$part.'区</th></tr>';
	            

	//             $sql_floor="SELECT DISTINCT floor FROM dorm WHERE part = '$part' and build_num = '$build_num' and region = '$region' ORDER BY floor DESC";
	//             $result_floor= $db->query($sql_floor);
	//             while($row_floor = $result_floor->fetch_array(MYSQLI_ASSOC)){
	//                 //echo $row_floor['floor'];
	//                 $floor = $row_floor['floor'];

	//                 $this_floor=$region."$build_num"."#"."$part"."区"."$floor"."层";
	//                 $sql_check="SELECT * FROM routine_add WHERE add_floor = '$this_floor' and date = '$date'";
	//                 $result_of_check = $db->query($sql_check);
	//                 if ($result_of_check->num_rows != 0){
	//                     echo '<tr><td class="is_green">
	//                		<form action="display.php" style="margin: 0;" method="post">';
	//                     echo "<input name = 'date' value = '$date' style='display: none;' />";
	// 					echo "<input name = 'region' value = '$region' style='display: none;' />";
	// 					echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
	// 					echo "<input name = 'part' value = '$part' style='display: none;' />";
	// 					echo "<input name = 'floor' value = '$floor' style='display: none;' />";
	// 					echo "<button name = 'display_date_floor' class='btn btn-success' value = 'display_date_floor' type='submit' style='width: 100%;' >".$floor."层</button>";
	// 					echo '
	//                     </form>';                  
	//                     echo '</td></tr>';
	//                 }else{
	//                     echo '<tr><td class="is_gray">
	//                		<form style="margin: 0;" action="add.php" method="post">';
	//                     echo "<input name = 'date' value = '$date' style='display: none;' />";
	// 					echo "<input name = 'region' value = '$region' style='display: none;' />";
	// 					echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
	// 					echo "<input name = 'part' value = '$part' style='display: none;' />";
	// 					echo "<input name = 'floor' value = '$floor' style='display: none;' />";
	// 					echo "<button name = 'add_step1' class='btn btn-default' value = 'add_step1' type='submit' style='width: 100%;' >".$floor."层</button>";
	// 					echo '
	//                     </form>';
	                    
	//                     echo '</td></tr>';
	//                 }


	               
	//             }
	//         echo '</table>';
	//         }
	//     }
	// }
	// echo '
	//     </div>
	// </div>

	// <style type="text/css">
	// td.is_green {
	//     color: #468847;
	//     background-color: #dff0d8!important;
	// }                       
	// td.is_gray {
	//     color: #ccc;
	//     background-color: #f9f9f9!important;
	// }
	// .build_model{
	//     width: 100px ;
	//     /*float: left;*/
	//     vertical-align: bottom;
	//     display: inline-table;
	//     /* ie6/7 */
	//     *display: inline;
	//     zoom: 1;
	//     margin-left:10px;
	// }

	// .build_model_container{

	// }
	// </style>
	// ';
//comment end


}


elseif ($_GET["view_display_step"]=="2"){
	$date=$_GET["date"];
	$region=$_GET["region"];
	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}
	// else{
	// 	die("不住宿");
	// }

	$build_num=$_GET["build_num"];
	$part=$_GET["part"];
	$floor=$_GET["floor"];

	//echo "$region$build_num$part$floor";
	//$sql="SELECT * FROM dorm";
	$sql="SELECT * FROM dorm WHERE region = '$region' and build_num = '$build_num' and part = '$part' and floor = '$floor'";
	$result = $db->query($sql) or die($db->error);

	$floor_add=$region.'苑'.$build_num.'号楼'.$part.'区'.$floor.'层';
	echo '<p>您选择的日期为：<strong class="text-danger">'.$date.'</strong>  &nbsp;&nbsp;  楼层为：<strong class="text-danger">'.$floor_add.'</strong>  &nbsp;&nbsp;  (<strong>0区</strong>代表此楼不分AB区)</p> ';


	$sql_check="SELECT * FROM dorm,routine_list WHERE routine_list.date='$date' and dorm.region = '$region' and dorm.build_num = '$build_num' and dorm.part = '$part' and dorm.floor = '$floor' and dorm.dorm_num=routine_list.dorm_num ";
	$result_of_check = $db->query($sql_check);

	if ($result_of_check->num_rows != 0) {


			//Add contents start
			$add_floor=$region."$build_num"."#"."$part"."区"."$floor"."层";
			$sql="SELECT * FROM routine_list where date = '" . $date ."' and add_floor = '".$add_floor."' " ;
			$result= $db->query($sql);
			if ($result->num_rows != 0) {
				echo '<div id="dvData">';
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

				$this_page=$_SERVER['PHP_SELF'];
				echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
				echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续查询</a>';
				//echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择</button></a>';
				//echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
				echo '</div>';//dor dvData
				//Add contents finish

				echo '
			</div>
		</div>';


	//include export js 
	// $filename=$date;
	// require_once("export.php");

	}

	else{

		echo '<div class="well">';
		echo '<div class="alert alert-danger" role="alert">
		日期为<strong>'.$date.'</strong> ，楼层为<strong>'.$region.$build_num.'#'.$part.'区'.$floor.'层</strong>的记录 <strong>不存在！</strong></div>';
		$this_page=$_SERVER['PHP_SELF'];
		echo '<a href="#build_top"><button class="btn btn-default">重新选择</button></a>';
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主页</button></a>';
		echo '</div>';
	
	}

	//die();














	echo "<style>
        .dorm_model_container_panel{
            /*visibility:hidden;*/
            /*height:500px;*/

        }
        .main{
            height:1500px;
        }  
        .dorm_list_div{
        	width:200px;
        	float: left;
        } 
        .dorm_list_right{
        	float:left;
        }     
    </style>";


}




























































//>>>>>>>>>>>>>>>>>>>>>View add Code at here>>>>>>>>>>>>>>>>>>>>
elseif ($_GET["view_step"]=="1") {
	$date=$_GET["date"];
	//echo $date;
echo '<p>您选择的日期为：<strong class="text-danger">'.$date.'</strong>  &nbsp;&nbsp;   <strong class="bg-success text-success">绿色</strong>代表有记录 (<strong>0区</strong>代表此楼不分AB区)</p> ';
echo '<hr />';



$sql_region="SELECT DISTINCT region FROM dorm";
$result_region= $db->query($sql_region);

while($row_region = $result_region->fetch_array(MYSQLI_ASSOC)){
    //echo $row_region['region'];
    $region = $row_region['region'];

    $sql_build_num="SELECT DISTINCT build_num FROM dorm WHERE region = '$region' ORDER BY build_num ASC";
    $result_build_num= $db->query($sql_build_num);
    while($row_build_num = $result_build_num->fetch_array(MYSQLI_ASSOC)){
        //echo $row_build_num['build_num'];
        $build_num = $row_build_num['build_num'];


        $sql_part="SELECT DISTINCT part FROM dorm WHERE build_num = '$build_num' and region = '$region'";
        $result_part= $db->query($sql_part);
        while($row_part = $result_part->fetch_array(MYSQLI_ASSOC)){
            //echo $row_part['part'];
            $part = $row_part['part'];

        echo '<table class="table table-bordered _responsive-utilities build_model" >
            <tr><th>'.$build_num.'号楼'.$part.'区</th></tr>';
            

            $sql_floor="SELECT DISTINCT floor FROM dorm WHERE part = '$part' and build_num = '$build_num' and region = '$region' ORDER BY floor DESC";
            $result_floor= $db->query($sql_floor);
            while($row_floor = $result_floor->fetch_array(MYSQLI_ASSOC)){
                //echo $row_floor['floor'];
                $floor = $row_floor['floor'];

                $this_floor=$region."$build_num"."#"."$part"."区"."$floor"."层";
                $sql_check="SELECT * FROM routine_add WHERE add_floor = '$this_floor' and date = '$date'";
                $result_of_check = $db->query($sql_check);
                if ($result_of_check->num_rows != 0){
                    echo '<tr><td class="is_green">';
					$str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
					echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-success' value = '$str' style='width: 100%;' onclick='get_dorm_list(this.value)'>".$floor."层</button></a>";
					                  
                    echo '</td></tr>';
                }else{
                    echo '<tr><td class="is_gray">';

					$str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
					//echo "<p>$str</p>";
					//echo "<p>$this_floor</p>";
					//$str="bbbbbbbbbbbb";
					echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-default' value = '$str' style='width: 100%;' onclick='get_dorm_list(this.value)'>".$floor."层</button></a>";
					
                    
                    echo '</td></tr>';
                }


               
            }
        echo '</table>';
        }
    }
}
echo '
    </div>
</div>

<style type="text/css">
td.is_green {
    color: #468847;
    background-color: #dff0d8!important;
}                       
td.is_gray {
    color: #ccc;
    background-color: #f9f9f9!important;
}
.build_model{
    width: 100px ;
    /*float: left;*/
    vertical-align: bottom;
    display: inline-table;
    /* ie6/7 */
    *display: inline;
    zoom: 1;
    margin-left:10px;
}

.build_model_container{

}
</style>
';




}


elseif ($_GET["view_step"]=="2"){
	$date=$_GET["date"];
	$region=$_GET["region"];
	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}
	// else{
	// 	die("不住宿");
	// }

	$build_num=$_GET["build_num"];
	$part=$_GET["part"];
	$floor=$_GET["floor"];

	//echo "$region$build_num$part$floor";
	//$sql="SELECT * FROM dorm";
	$sql="SELECT * FROM dorm WHERE region = '$region' and build_num = '$build_num' and part = '$part' and floor = '$floor'";
	$result = $db->query($sql) or die($db->error);

	$floor_add=$region.'苑'.$build_num.'号楼'.$part.'区'.$floor.'层';
	echo '<p>您选择的日期为：<strong class="text-danger">'.$date.'</strong>  &nbsp;&nbsp;  楼层为：<strong class="text-danger">'.$floor_add.'</strong>  &nbsp;&nbsp;  (<strong>0区</strong>代表此楼不分AB区)</p> ';

	//echo '<button onClick="toggle(this)" id="check_all"> click</Button><br />';
	//echo '<input type="checkbox" onClick="toggle(this)" /> Toggle All<br/>';

	echo '<form method="post" action="view_add_input.php">';
	echo "<input name = 'date' value = '$date' style='display: none;' />";
	echo "<input name = 'region' value = '$region' style='display: none;' />";
	echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
	echo "<input name = 'part' value = '$part' style='display: none;' />";
	echo "<input name = 'floor' value = '$floor' style='display: none;' />";

	echo "<input name = 'add_floor' value = '".$region."$build_num"."#"."$part"."区"."$floor"."层' style='display: none;' />";
	echo '<div class="dorm_list_div">';

	$i=0;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$dorm_num=$row['dorm_num'];
		//echo "<button class='btn btn-default'>$dorm_num</button>";

		$sql_check="SELECT * FROM routine_list WHERE dorm_num = '$dorm_num' and date = '$date' ";
		$result_of_check = $db->query($sql_check) or die($db->error);
	//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaafaffff";
		if ($result_of_check->num_rows != 0){
			echo '<input type="checkbox" name="dorm_check'.$i.'" value="'.$dorm_num.'" data-label-text="'.$dorm_num.'" data-on-text="添加" data-off-text="已添加" data-off-color="success" data-switch-toggle="readonly" readonly/>';
		}else{
		echo '<input type="checkbox" name="dorm_check'.$i.'" value="'.$dorm_num.'"  data-label-text="'.$dorm_num.'" data-on-text="添加" data-off-text="不添加" checked/>';
		$i=$i+1;
		}

	}

	echo "</div>";


	echo '<div class="dorm_list_right">
	<button class="btn btn-default dorm_list_right_button" type="submit"  name="view_add_submit" value="'.$i.'" >为左侧选中的宿舍添加成绩</button>
	</div>';



	echo '</form>';






	echo "<style>
        .dorm_model_container_panel{
            /*visibility:hidden;*/
            /*height:500px;*/

        }
        .main{
            height:1500px;
        }  
        .dorm_list_div{
        	width:200px;
        	float: left;
        } 
        .dorm_list_right{
        	float:left;
        }     
    </style>";


}




//>>>>>>>>>>>>>>>>>>>>>View Del Code at here>>>>>>>>>>>>>>>>>>>>
elseif ($_GET["view_del_step"]=="1") {
	$date=$_GET["date"];
	//echo $date;
echo '<p>您选择的日期为：<strong class="text-danger">'.$date.'</strong>  &nbsp;&nbsp;   <strong class="bg-success text-success">绿色</strong>代表有记录 (<strong>0区</strong>代表此楼不分AB区)</p> ';
echo '<hr />';



$sql_region="SELECT DISTINCT region FROM dorm";
$result_region= $db->query($sql_region);

while($row_region = $result_region->fetch_array(MYSQLI_ASSOC)){
    //echo $row_region['region'];
    $region = $row_region['region'];

    $sql_build_num="SELECT DISTINCT build_num FROM dorm WHERE region = '$region' ORDER BY build_num ASC";
    $result_build_num= $db->query($sql_build_num);
    while($row_build_num = $result_build_num->fetch_array(MYSQLI_ASSOC)){
        //echo $row_build_num['build_num'];
        $build_num = $row_build_num['build_num'];


        $sql_part="SELECT DISTINCT part FROM dorm WHERE build_num = '$build_num' and region = '$region'";
        $result_part= $db->query($sql_part);
        while($row_part = $result_part->fetch_array(MYSQLI_ASSOC)){
            //echo $row_part['part'];
            $part = $row_part['part'];

        echo '<table class="table table-bordered _responsive-utilities build_model" >
            <tr><th>'.$build_num.'号楼'.$part.'区</th></tr>';
            

            $sql_floor="SELECT DISTINCT floor FROM dorm WHERE part = '$part' and build_num = '$build_num' and region = '$region' ORDER BY floor DESC";
            $result_floor= $db->query($sql_floor);
            while($row_floor = $result_floor->fetch_array(MYSQLI_ASSOC)){
                //echo $row_floor['floor'];
                $floor = $row_floor['floor'];

                $this_floor=$region."$build_num"."#"."$part"."区"."$floor"."层";
                $sql_check="SELECT * FROM routine_list WHERE add_floor = '$this_floor' and date = '$date'";
                $result_of_check = $db->query($sql_check);
                if ($result_of_check->num_rows != 0){
                    echo '<tr><td class="is_green">';
					$str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
					echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-success' value = '$str' style='width: 100%;' onclick='view_del_get_dorm(this.value)'>".$floor."层</button></a>";
					                  
                    echo '</td></tr>';
                }else{
                    echo '<tr><td class="is_gray">';

					$str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
					//echo "<p>$str</p>";
					//echo "<p>$this_floor</p>";
					//$str="bbbbbbbbbbbb";
					echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-default' value = '$str' style='width: 100%;' onclick='view_del_get_dorm(this.value)'>".$floor."层</button></a>";
					
                    
                    echo '</td></tr>';
                }


               
            }
        echo '</table>';
        }
    }
}
echo '
    </div>
</div>

<style type="text/css">
td.is_green {
    color: #468847;
    background-color: #dff0d8!important;
}                       
td.is_gray {
    color: #ccc;
    background-color: #f9f9f9!important;
}
.build_model{
    width: 100px ;
    /*float: left;*/
    vertical-align: bottom;
    display: inline-table;
    /* ie6/7 */
    *display: inline;
    zoom: 1;
    margin-left:10px;
}

.build_model_container{

}
</style>
';




}


elseif ($_GET["view_del_step"]=="2"){
	$date=$_GET["date"];
	$region=$_GET["region"];
	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}
	// else{
	// 	die("不住宿");
	// }

	$build_num=$_GET["build_num"];
	$part=$_GET["part"];
	$floor=$_GET["floor"];

	//echo "$region$build_num$part$floor";
	//$sql="SELECT * FROM dorm";
	$sql="SELECT * FROM dorm WHERE region = '$region' and build_num = '$build_num' and part = '$part' and floor = '$floor'";
	$result = $db->query($sql) or die($db->error);

	$floor_add=$region.'苑'.$build_num.'号楼'.$part.'区'.$floor.'层';
	echo '<p>您选择的日期为：<strong class="text-danger">'.$date.'</strong>  &nbsp;&nbsp;  楼层为：<strong class="text-danger">'.$floor_add.'</strong>  &nbsp;&nbsp;  (<strong>0区</strong>代表此楼不分AB区)</p> ';

	echo '<form method="post" action="view_del_confirm.php">';

	echo "<input name = 'date' value = '$date' style='display: none;' />";
	echo "<input name = 'region' value = '$region' style='display: none;' />";
	echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
	echo "<input name = 'part' value = '$part' style='display: none;' />";
	echo "<input name = 'floor' value = '$floor' style='display: none;' />";


	echo "<input name = 'add_floor' value = '".$region."$build_num"."#"."$part"."区"."$floor"."层' style='display: none;' />";
	echo '<div class="dorm_list_div">';
	$i=0;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$dorm_num=$row['dorm_num'];
		//echo "<button class='btn btn-default'>$dorm_num</button>";

		$sql_check="SELECT * FROM routine_list WHERE dorm_num = '$dorm_num' and date = '$date' ";
		$result_of_check = $db->query($sql_check) or die($db->error);
	//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaafaffff";
		if ($result_of_check->num_rows != 0){
			echo '<input type="checkbox" name="dorm_check'.$i.'" value="'.$dorm_num.'" data-label-text="'.$dorm_num.'" data-on-text="删除" data-off-text="不删除" data-on-color="danger" data-off-color="success" />';
			$i=$i+1;
		}else{
		echo '<input type="checkbox" name="dorm_check'.$i.'" value="'.$dorm_num.'"  data-label-text="'.$dorm_num.'" data-on-text="删除" data-off-text="无记录" data-switch-toggle="readonly" readonly/>';
		
		}

	}

	echo "</div>";


	echo '<div class="dorm_list_right">
	<button class="btn btn-default " type="submit"  name="view_del_submit" value="'.$i.'" >为左侧选中的宿舍删除记录</button>
	</div>';



	echo '</form>';






	echo "<style>
        .dorm_model_container_panel{
            /*visibility:hidden;*/
            /*height:500px;*/

        }
        .main{
            height:1500px;
        }  
        .dorm_list_div{
        	width:200px;
        	float: left;
        } 
        .dorm_list_right{
        	float:left;
        }     
    </style>";


}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>> view dorm >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
elseif ($_GET["view_dorm_step"]=="2"){
	$date=$_GET["date"];
	$region=$_GET["region"];
	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}
	// else{
	// 	die("不住宿");
	// }

	$build_num=$_GET["build_num"];
	$part=$_GET["part"];
	$floor=$_GET["floor"];

	//echo "$region$build_num$part$floor";
	//$sql="SELECT * FROM dorm";
	$sql="SELECT * FROM dorm WHERE region = '$region' and build_num = '$build_num' and part = '$part' and floor = '$floor'";
	$result = $db->query($sql) or die($db->error);

	$floor_add=$region.'苑'.$build_num.'号楼'.$part.'区'.$floor.'层';
	echo '<p>您选择的楼层为：<strong class="text-danger">'.$floor_add.'</strong>  &nbsp;&nbsp; &nbsp;&nbsp;(
<strong class="bg-success text-success">绿色</strong>代表有记录  <strong>0区</strong>代表此楼不分AB区)</p> ';

	//echo '<form method="post" action="view_del_confirm.php">';

	echo "<input name = 'date' value = '$date' style='display: none;' />";
	echo "<input name = 'region' value = '$region' style='display: none;' />";
	echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
	echo "<input name = 'part' value = '$part' style='display: none;' />";
	echo "<input name = 'floor' value = '$floor' style='display: none;' />";


	echo "<input name = 'add_floor' value = '".$region."$build_num"."#"."$part"."区"."$floor"."层' style='display: none;' />";
	echo '<div class="dorm_list_div">';
	$i=0;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$dorm_num=$row['dorm_num'];
		//echo "<button class='btn btn-default'>$dorm_num</button>";

		$sql_check="SELECT * FROM routine_list WHERE dorm_num = '$dorm_num'";
		$result_of_check = $db->query($sql_check) or die($db->error);
		//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaafaffff";
		$dorm_num_replace=str_replace("#","%23",$dorm_num);
		//str_replace("world","Shanghai","Hello world!");
		//echo $dorm_num;
		if ($result_of_check->num_rows != 0){
			//echo '<input type="checkbox" name="dorm_check'.$i.'" value="'.$dorm_num.'" data-label-text="'.$dorm_num.'" data-on-text="删除" data-off-text="不删除" />';
			echo "<a href='#routine_top'><button class='btn btn-success' value='".$dorm_num_replace."' onclick='view_dorm_routine(this.value)'>$dorm_num</button></a>";
			$i=$i+1;
		}else{
			echo "<a href='#routine_top'><button class='btn btn-default' value='".$dorm_num_replace."' onclick='view_dorm_routine(this.value)'>$dorm_num</button></a>";
		
		}

	}

	echo "</div>";


	// echo '<div class="dorm_list_right">
	// <button class="btn btn-default " type="submit"  name="view_del_submit" value="'.$i.'" >为左侧选中的宿舍删除记录</button>
	// </div>';



	//echo '</form>';






	echo "<style>
        .dorm_model_container_panel{
            /*visibility:hidden;*/
            /*height:500px;*/

        }
        .main{
            height:1500px;
        }  
        .dorm_list_div{
        	/*width:200px;
        	float: left;*/
        } 
        .dorm_list_right{
        	float:left;
        }     
    </style>";


}

elseif ($_GET["view_dorm_step"]=="3"){

	$dorm_num=$_GET["dorm_num"];
//var_dump($_GET);

//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-success">
			<div class="panel-heading"><strong class="text-danger">'.$dorm_num.'</strong>宿舍的记录如下：</div>
			<div class="panel-body" id="dvData">
				';
//Add contents start
				$table_name="routine_list";
				$sql="SELECT * FROM $table_name WHERE dorm_num='$dorm_num'";
				$result = $db->query($sql) or die($db->error);
if ($result->num_rows != 0){
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
				echo "</table>";
			
			$this_page=$_SERVER['PHP_SELF'];
			echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
			//echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续查询</a>';		
			//echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
			echo "</form>";			
//Add contents finish
}else{
	echo '<strong class="text-danger">'.$dorm_num.'</strong> 宿舍的记录 <strong class="text-danger">不存在！</strong>';
}
			echo '
		</div>
	</div>';


//include export js 
			// $filename=$dorm_num;
			// require_once("export.php");

//Panel end        <<<<<<<<<<<<<<<

}





















?>