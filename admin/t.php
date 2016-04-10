<?php

require_once('html.php');
// echo "今天是 " . date("Y/m/d  h:i:s") . "<br>";

// function c_ip_a(){
//     return $_SERVER['REMOTE_ADDR'];
// }
// function c_ip_b(){
//     return $_SERVER['HTTP_X_FORWARDED_FOR'];
// }


// $a=c_ip_a();
// $b=c_ip_b();
// echo "ipa: $a";

// echo "ipb: $b";

// echo $_SERVER['HTTP_USER_AGENT'];
// echo "<br>";

if(isset($_POST["a"])){
	$a=$_POST["a"];

	echo "a is ".$a."<br />";
}
else{
	echo "unset_A<br />";
}

if(isset($_POST["b"])){
	$b=$_POST["b"];
	echo "b is ".$b."<br />";
}
else{
	echo "unset_b<br />";
}

var_dump($_POST);



?>





<form name="input" action="t.php" method="post">

<input type="checkbox" name="a" value="Bike" checked="checked" data-label-text="南啦啦" data-on-text="选中" data-off-text="不选" />


<input type="checkbox" name="b" value="Car" />


<input type="checkbox" name="vehicle" value="Airplane" />


<input type="submit" value="Submit" />
</form> 
<input type="checkbox" name="a" value="Bike" checked="checked" data-label-text="'.$dorm_num.'" data-on-text="选中" data-off-text="不选" />




<!--This is for check box-->
<!-- <link href="css/bootstrap-switch.min.css" rel="stylesheet">
<script src="js/bootstrap-switch.min.js"></script>
<script>
$(function(argument) {
  $('[type="checkbox"]').bootstrapSwitch();
})
</script> -->

<input type="checkbox" onClick="toggle(this)" /> Toggle All<br/>

<input type="checkbox" class="check" name="foo" value="bar1"> Bar 1<br/>
<input type="checkbox" class="check" name="foo" value="bar2"> Bar 2<br/>
<input type="checkbox" class="check" name="foo" value="bar3"> Bar 3<br/>
<input type="checkbox" class="check" name="foo" value="bar4"> Bar 4<br/>


<script>
function toggle(source) {
  checkboxes = document.getElementsByClassName('check');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

