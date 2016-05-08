<?php
//This script need $date predefined
?>



<p>请选择检查日期：</p>

<input type="text" class="span2 form-control drop_list_add" value="<?php echo date("Y-m-d");?>" id="dp1" name="date" required>
<style type="text/css">
	.activeClass{
   	background: #5CB85C; 
  }
</style>

<!-- <script src="js/jquery-1.12.2.min.js"></script> -->
<script src="js/bootstrap-datepicker.min.js"></script>
<script>

var active_dates = [
<?php
/* 
//Below is format
"2016-04-10",
"2016-04-17",
*/
//must has the db connection before
$sql="SELECT DISTINCT date FROM routine_list";
$result = $db->query($sql) or die($db->error);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '"' .$row['date'].'",' ;
}
?>

];

$('#dp1').datepicker({
	format: "yyyy-mm-dd",
     autoclose: true,
     /*todayHighlight: true,*/

// >>>>>>>>>>>>>Below is tomorrow code
//      endDate: "<?php $datetime = new DateTime('tomorrow');
// echo $datetime->format('Y-m-d');?>",

endDate: "<?php echo date("Y-m-d");?>",





     beforeShowDay: function(date){
         var d = date;
         var curr_date = d.getDate();
         var curr_month = d.getMonth() + 1; //Months are zero based
         if(curr_month<10){
         	curr_month="0"+curr_month
         }
        if(curr_date<10){
          curr_date="0"+curr_date
         }
         var curr_year = d.getFullYear();
         var formattedDate = curr_year + "-" + curr_month + "-" + curr_date

           if ($.inArray(formattedDate, active_dates) != -1){
               return {
                  classes: 'activeClass'
               };
           }
          return;

	}

});




</script>

