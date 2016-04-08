<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
check_permission(5);
require_once("view_js.php");





echo '<div  id="build_top">喔喔~看不见我~看不见我~</div>';
echo '
<div class="panel panel-default build_model_container_panel" id="button_1">  
    <div class="panel-body build_model_container" id="build_model_container">';


echo '<p>所有宿舍楼如下所示：<strong class="text-danger">'.$date.'</strong>  
&nbsp;&nbsp;
<strong class="bg-success text-success">绿色</strong>代表有记录 (<strong>0区</strong>代表此楼不分AB区)</p> ';

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
                $sql_check="SELECT * FROM routine_add WHERE add_floor = '$this_floor' ";
                $result_of_check = $db->query($sql_check);
                if ($result_of_check->num_rows != 0){
                    echo '<tr><td class="is_green">';
                    $str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
                    echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-success' value = '$str' style='width: 100%;' onclick='view_get_dorm(this.value)'>".$floor."层</button></a>";
                                      
                    echo '</td></tr>';
                }else{
                    echo '<tr><td class="is_gray">';

                    $str="date=$date&region=$region&build_num=$build_num&part=$part&floor=$floor";
                    //echo "<p>$str</p>";
                    //echo "<p>$this_floor</p>";
                    //$str="bbbbbbbbbbbb";
                    echo "<a href='#dorm_top'><button name = 'add_step1' class='btn btn-default' value = '$str' style='width: 100%;' onclick='view_get_dorm(this.value)'>".$floor."层</button></a>";
                    
                    
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





































echo '<div  id="dorm_top">喔喔~也看不见我~看不见我~</div>';
echo '
<div class="panel panel-default dorm_model_container_panel" id="button_2">

    <div class="panel-body dorm_model_container" id="dorm_model_container">
        <style>
        .dorm_model_container_panel{
            visibility:hidden;
            /*height:500px;*/

        }
        .main{
            height:1000px;
        }
         
    </style>

    ';      
echo '</div></div>';


echo '<div  id="routine_top">喔喔~也看不见我~看不见我~</div>';
echo '
<div class="panel panel-default routine_model_container_panel" id="button_3">

    <div class="panel-body routine_model_container" id="routine_model_container">
        <style>
        .routine_model_container_panel{
            visibility:hidden;
            /*height:500px;*/

        }
        .main{
            height:1000px;
        }
         
    </style>

    ';      
echo '</div></div>';



    
?>

<style>
#build_top{
    /*position: fixed;*/
    visibility:hidden;
    margin-bottom: 50px;
}
#dorm_top{
    /*position: fixed;*/
    visibility:hidden;
    margin-bottom: 50px;
}
#routine_top{
    /*position: fixed;*/
    visibility:hidden;
    margin-bottom: 50px;
}





    .build_model_container_panel{
       /*margin-top: 50px;*/
    }
    .dorm_model_container_panel{
        /*margin-bottom: 50px;*/
    }
</style>



<!--This is for check box-->
<link href="css/bootstrap-switch.min.css" rel="stylesheet">
<script src="js/bootstrap-switch.min.js"></script>
<script>
$(function(argument) {
  $('[type="checkbox"]').bootstrapSwitch();
 $(document).ajaxComplete(function(event, xhr, settings) {
      $('[type="checkbox"]').bootstrapSwitch();
   });
})
</script>
