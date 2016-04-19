<?php

require_once("auth.php"); // verify whether login
require_once("db_connection.php");

if(isset($_POST["stu_id"])){
//    var_dump($_POST);
}

$stu_id=$_POST["stu_id"];
$stu_comment=$_POST["stu_comment"];

$sql="UPDATE students SET stu_comment = '$stu_comment' WHERE stu_id='$stu_id'";
$result = $db->query($sql) or die($db->error);





$sql="SELECT * FROM students WHERE stu_id='$stu_id'";
$result = $db->query($sql) or die($db->error);
$row = $result->fetch_array(MYSQLI_ASSOC);

echo '
<p style="float: left;">备注：</p>

	    <button onclick="edit'.$row['bed_num'].'()" style="float: right;" class="edit_comment btn btn-info btn-xs">修改</button>
	    
	    <textarea style="width: 100%;height: 70%;" class="input_comment_readonly" >'.$row['stu_comment'].'</textarea>

	    <form id="stu_comment_form'.$row['bed_num'].'" style="width: 100%;height: 70%;">
	      <input name = "stu_id" value = "'.$row['stu_id'].'" style="display: none;" />  
	      <input name = "bed_num" value = "'.$row['bed_num'].'" style="display: none;" />   
	      <textarea  class="input_comment" style="width: 100%;height: 100%;" name="stu_comment">'.$row['stu_comment'].'</textarea>
	      <button type="submit" name="submit_comment" style="float: right;" class="submit_comment btn btn-success btn-xs">提交</button>      
	    </form>
	    <button  style="float: left;" class="cancel_edit btn btn-warning btn-xs" onclick="cancelEdit'.$row['bed_num'].'()">取消</button>
';

?>