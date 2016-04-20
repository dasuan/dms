<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
check_permission($level_stu_m);

echo '
<ol class="breadcrumb">
    <li><a href="index.php">主页</a></li>
    <li class="active">宿舍信息</li>
</ol>
';


if(isset($_POST["submit_comment"])){
    var_dump($_POST);
}




require_once("view_js.php");

//choose dorm_num
echo '
<div class="panel panel-info">
    <div class="panel-heading">方式1：通过宿舍号查询</div>
    <div class="panel-body">
        ';
        //define a form to submit dorm_num
        echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='dorm_num' id='dorm_num_dorm'>";
        //define a select input
        echo '<select name="dorm_num" class= "form-control display_dorm_num_select" id="dorm_num_select">';
        echo '<option value="none" selected="selected">请选择宿舍号</option>';
        //connect to dorm table
        $sql="SELECT * FROM dorm";
        $result = $db->query($sql);
        //per row loop
        while($row = $result->fetch_array(MYSQLI_ASSOC)){   
            //per row's dormnum's value display option
            $row_dorm_num=$row['dorm_num'];
            echo "<option value='$row_dorm_num'>$row_dorm_num</option>";
        }
        echo '</select>';
        echo '<div class="button_div"><button  class="btn btn-default" type="submit" name="login" id="dorm_submit_btn">提交宿舍号</button></div>';
        echo "</form>
    </div>
</div>";
//         echo "
//     </div>
// </div>";














echo '<div  id="build_top">喔喔~看不见我~看不见我~</div>';
echo '
<div class="panel panel-info build_model_container_panel dorm1" id="button_1">
    <div class="panel-heading">方式2：通过楼层定位宿舍</div>  
    <div class="panel-body build_model_container" id="build_model_container">';


echo '<p>请选择楼层，所有宿舍楼如下所示：<strong class="text-danger">'.$date.'</strong>  
&nbsp;&nbsp;</p> ';

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

                    echo '<tr><td class="is_gray">';
                    $str="region=$region&build_num=$build_num&part=$part&floor=$floor";
                    echo "<a><button name = 'add_step1' class='btn btn-default' value = '$str' style='width: 100%;' onclick='stu_m_get_dorm(this.value)'>".$floor."层</button></a>";                                  
                    echo '</td></tr>';
                


               
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
<div class="panel panel-default dorm_model_container_panel dorm2" id="button_2">

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
<div class="panel panel-default routine_model_container_panel dorm3" id="button_3">

    <div class="panel-body routine_model_container" id="routine_model_container">
        <style>
        .routine_model_container_panel{
            visibility:hidden;
            /*height:500px;*/

        }
        .main{
            height:1500px;
        }
         
    </style>

    ';      
echo '</div></div>';



    
?>

<style>
#build_top{
    /*position: fixed;*/
    position: absolute;
    top:180px;
    visibility:hidden;
    
}
#dorm_top{
    position: absolute;
    top:500px;
    visibility:hidden;
}

#routine_top{
    position: absolute;
    top:668px;
    visibility:hidden;
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
// $(function(argument) {
//   $('[type="checkbox"]').bootstrapSwitch();
//  $(document).ajaxComplete(function(event, xhr, settings) {
//       $('[type="checkbox"]').bootstrapSwitch();
//    });
// })
<?php
for ($x=1; $x<=6; $x++) {
  echo '
    function edit'.$x.'(){
        $("div#stu_sec'.$x.' .cancel_edit").show("fast");
        $("div#stu_sec'.$x.' .input_comment").show("fast");        
        $("div#stu_sec'.$x.' .submit_comment").show("fast");
        
        $("div#stu_sec'.$x.' .input_comment_readonly").hide("fast");
        $("div#stu_sec'.$x.' .edit_comment").hide("fast");
      }

      function cancelEdit'.$x.'(){
        $("div#stu_sec'.$x.' .edit_comment").show("fast");
        $("div#stu_sec'.$x.' .input_comment_readonly").show("fast");

        $("div#stu_sec'.$x.' .submit_comment").hide("fast");
        $("div#stu_sec'.$x.' .input_comment").hide("fast");
        $("div#stu_sec'.$x.' .cancel_edit").hide("fast");
      }
  ';


} 
?>


// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> for way1 ajax >>>>>>>>>>>>>>>>>
$(document).ready(function(){
// Bind to the submit event of our form
$("#dorm_num_dorm").submit(function(event){

// Variable to hold request
var request;


    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Lets select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Lets disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "ajax_get.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
        //alert(response);
        document.getElementById("routine_model_container").innerHTML=response;

        $(".dorm1").css({"display":"none"});
        $(".dorm2").css({"display":"none"});
        $(".dorm3").css({"display":"block"});
        $("html,body").animate({scrollTop: $("#routine_model_container").offset().top-62}, 500);


<?php
for ($x=1; $x<=6; $x++) {
echo '
$(document).ready(function repeat'.$x.'(){
        $(".edit_comment").show("fast");
        $(".input_comment_readonly").attr("readonly", true);

        $(".input_comment").hide();
        $(".submit_comment").hide();
        $(".cancel_edit").hide();

// Bind to the submit event of our form
$("#stu_comment_form'.$x.'").submit(function(event){

// Variable to hold request
var request;


    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Lets select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Lets disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "stu_m_ajax.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");

        document.getElementById("stu_comment'.$x.'").innerHTML=response;

        $(document).ready(repeat'.$x.'());



    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

    // Prevent default posting of form
    event.preventDefault();
});

});
';
}
?>



    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

    // Prevent default posting of form
    event.preventDefault();
});

});


      

</script>


