<script type="text/javascript">
	function score_sum(){
		var tab = document.getElementById("table_adding") ;
		var rows = tab.rows.length - 1 ; //remove table head
		for (var i=0;i<rows;i++)
		{	
			var da="wc_balcony" + i.toString(10)
			var db="bed" + i.toString(10)
			var dc="desk_cupboard" + i.toString(10)
			var dd="ground" + i.toString(10)
			var de="security" + i.toString(10)
			//document.write(da)
			var a = parseInt(document.getElementById(da).value, 10);
			var b = parseInt(document.getElementById(db).value, 10);
			var c = parseInt(document.getElementById(dc).value, 10);
			var d = parseInt(document.getElementById(dd).value, 10);
			var e = parseInt(document.getElementById(de).value, 10);
			var sum = a + b + c + d + e 

			var dsum="score" + i.toString(10)
			document.getElementById(dsum).value = sum
		}
	}

</script>


