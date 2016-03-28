<?php
echo "今天是 " . date("Y/m/d  h:i:s") . "<br>";

function c_ip_a(){
    return $_SERVER['REMOTE_ADDR'];
}
function c_ip_b(){
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
}


$a=c_ip_a();
$b=c_ip_b();
echo "ipa: $a";

echo "ipb: $b";

echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";





?>