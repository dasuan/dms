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
		die();
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

//>>>>>>>>>>>>>>>>>>>>>View Code at here>>>>>>>>>>>>>>>>>>>>
elseif ($_GET["view_step"]=="1") {
	$date=$_GET["date"];
	//echo $date;
echo '<p>您选择的日期为：<strong class="text-danger">'.$date.'</strong>    绿色代表有记录</p>';
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
                    echo '<tr><td class="is_green">
               		<form action="display.php" style="margin: 0;" method="post">';
                    echo "<input name = 'date' value = '$date' style='display: none;' />";
					echo "<input name = 'region' value = '$region' style='display: none;' />";
					echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
					echo "<input name = 'part' value = '$part' style='display: none;' />";
					echo "<input name = 'floor' value = '$floor' style='display: none;' />";
					echo "<button name = 'display_date_floor' class='btn btn-success' value = 'display_date_floor' type='submit' style='width: 100%;' >".$floor."层</button>";
					echo '
                    </form>';                  
                    echo '</td></tr>';
                }else{
                    echo '<tr><td class="is_gray">
               		<form style="margin: 0;" action="add.php" method="post">';
                    echo "<input name = 'date' value = '$date' style='display: none;' />";
					echo "<input name = 'region' value = '$region' style='display: none;' />";
					echo "<input name = 'build_num' value = '$build_num' style='display: none;' />";
					echo "<input name = 'part' value = '$part' style='display: none;' />";
					echo "<input name = 'floor' value = '$floor' style='display: none;' />";
					echo "<button name = 'add_step1' class='btn btn-default' value = 'add_step1' type='submit' style='width: 100%;' >".$floor."层</button>";
					echo '
                    </form>';
                    
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



















?>