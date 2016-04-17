<?php
//This script need $date predefined
?>


<link href="css/datepicker.css" rel="stylesheet">
<p>请选择检查日期：</p>
	<input type="text" class="span2 form-control drop_list_add" value="<?php echo date("Y-m-d");?>" id="dp1" name="date" required>

<script>
var monster = {
	set: function(name, value, days, path, secure) {
		var date = new Date(),
			expires = '',
			type = typeof(value),
			valueToUse = '',
			secureFlag = '';
		path = path || "/";
		if (days) {
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}
		if (type === "object" && type !== "undefined") {
			if (!("JSON" in window)) throw "Bummer, your browser doesn't support JSON parsing.";
			valueToUse = encodeURIComponent(JSON.stringify({
				v: value
			}));
		}
		else {
			valueToUse = encodeURIComponent(value);
		}
		if (secure) {
			secureFlag = "; secure";
		}
		document.cookie = name + "=" + valueToUse + expires + "; path=" + path + secureFlag;
	},
	get: function(name) {
		var nameEQ = name + "=",
			ca = document.cookie.split(';'),
			value = '',
			firstChar = '',
			parsed = {};
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) === 0) {
				value = decodeURIComponent(c.substring(nameEQ.length, c.length));
				firstChar = value.substring(0, 1);
				if (firstChar == "{") {
					try {
						parsed = JSON.parse(value);
						if ("v" in parsed) return parsed.v;
					}
					catch (e) {
						return value;
					}
				}
				if (value == "undefined") return undefined;
				return value;
			}
		}
		return null;
	}
};

if (!monster.get('cookieConsent')) {
	var cookieConsentAct = function() {
			document.getElementById('cookieConsent').style.display = 'none';
			monster.set('cookieConsent', 1, 360, '/');
		};
	document.getElementById('cookieConsent').style.display = 'block';
	var cookieConsentEl = document.getElementById('cookieConsentAgree');
	if (cookieConsentEl.addEventListener) {
		cookieConsentEl.addEventListener('click', cookieConsentAct, false);
	}
	else if (cookieConsentEl.attachEvent) {
		cookieConsentEl.attachEvent("onclick", cookieConsentAct);
	}
	else {
		cookieConsentEl["onclick"] = cookieConsentAct;
	}
}
</script>

    <!-- <script src="js/jquery-1.12.2.min.js"></script> -->
    <script src="js/bootstrap-datepicker-min.js"></script>
	<script>
	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'yyyy-mm-dd'
			});
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			$('#dp3').datepicker();
			$('#dpYears').datepicker();
			$('#dpMonths').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,2,19);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	</script>

