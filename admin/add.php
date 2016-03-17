<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
//Display welcome message
echo "<h1>This is add page</h1> ";
?>

<form>
<select name="101">
<option value="none" selected="selected">未记录</option>
<option value="100">100</option>
<option value="95">95</option>
<option value="90">90</option>
<option value="85">85</option>
<option value="80">80</option>
<option value="75">75</option>
<option value="70">70</option>
<option value="65">65</option>
<option value="60">60</option>
<option value="55">55</option>
<option value="50">50</option>
<option value="45">45</option>
<option value="40">40</option>
<option value="35">35</option>
<option value="30">30</option>
<option value="25">25</option>
<option value="20">20</option>
<option value="15">15</option>
<option value="10">10</option>
<option value="5">5</option>
<option value="0">0</option>
</select>
</form>






<?php
require_once("footer.php");
?>

