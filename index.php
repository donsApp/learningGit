<!DOCTYPE html>
<html>
<head>
	<title>Daily Weather</title>

	<script
	  src="https://code.jquery.com/jquery-3.3.1.js"
	  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	  crossorigin="anonymous">
  	</script>
</head>
<body>
	<input id="city"></input>
	<button id="getWeatherForcast">Get Weather</button>
	<div id="showWeatherForcast"></div>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#getWeatherForcast").click(function(){

				
				var city = $('#city').val();
				var key = 'fe06ced0920bc1e60a8fc0f69d38d9fa';

				$.ajax({
					url: 'http://api.openweathermap.org/data/2.5/weather',
					dataType: 'json',
					type: 'GET',
					data: {q:city, appid: key, units: 'metric'},

					success: function(data){
						var wf = '';
						$.each(data.weather, function(index, val){

							wf += '<p><b>' + data.name + "</b><img src="+ val.icon + ".png></p>" + data.main.temp + '&deg;C ' + ' | ' + val.main + ", " + val.description
						});

						$('#showWeatherForcast').html(wf);
					}
				});
			});
		});
	</script>
</body>
</html>