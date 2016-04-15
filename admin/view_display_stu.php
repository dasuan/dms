<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
check_permission($level_display);

echo '
<ol class="breadcrumb">
    <li><a href="index.php">主页</a></li>
    <li><a href="view_display.php">显示</a></li>
    <li class="active">查询</li>
</ol>
';

//choose student id
echo '      
<div class="panel panel-info">
    <div class="panel-heading">通过学号查询</div>
    <div class="panel-body">
        ';
        echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='stu_id'>";
        echo '<input id="stu_id" class="form-control display_input" type="text" name="stu_id" placeholder="请输入学号" required />';
        echo '<a href="#stu_top"><div class="button_div"><button class="btn btn-default" type="submit" name="stu_id_button">提交学号</button></div></a>';
        echo "</form>
    </div>
</div>";


if (isset($_POST["stu_id"])) {
    $stu_id=$_POST["stu_id"];
    $table_name="students";
    $sql="SELECT * FROM $table_name WHERE stu_id='$stu_id'";
    $stu_info = $db->query($sql) or die($db->error);
    $num_rows=$stu_info->num_rows;

    if($num_rows==0){
        echo "<div class='well'><div class='alert alert-danger' role='alert'>学号为 <strong>".$stu_id."</strong> 的学生不存在！</div>";
        $this_page=$_SERVER['PHP_SELF'];
        //echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
        echo '<a class="btn btn-default" href="'.$this_page.'">重新选择</a>';       
        echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
        echo '</div>';
    }else{
        $row = $stu_info->fetch_array(MYSQLI_ASSOC);
        $dorm_num=$row['dorm_num'];
        $bed_num=$row['bed_num'];
        $stu_name=$row['stu_name'];
//Panel start >>>>>>>>>>>>>>>>>>>>
        echo '
        <div class="panel panel-success">
            <div class="panel-heading">学号为 <strong class="text-danger">'.$stu_id.'</strong> 的学生姓名为 <strong class="text-danger">'.$stu_name.'</strong> ，宿舍号为 <strong class="text-danger">'.$dorm_num.'</strong> ，床号为 <strong class="text-danger">'.$bed_num.'</strong> ，记录如下：</div>
            <div class="panel-body" id="dvData">
                ';
//Add contents start
                $table_name="routine_list";
                $sql="SELECT * FROM $table_name WHERE dorm_num='$dorm_num'";
                $result = $db->query($sql) or die($db->error);
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

            echo '
        </div>
    </div>';
//Panel end        <<<<<<<<<<<<<<<


//include export js 
        $filename=$stu_id;
        require_once("export.php");
    }

}


?>
