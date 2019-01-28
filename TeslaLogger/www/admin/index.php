﻿<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teslalogger Config V1.2</title>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="http://teslalogger.de/teslalogger_style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
  $( function() {
    $( "button" ).button();
	GetCurrentData();
	
	setInterval(function()
		{
			if ( document.hasFocus() ) 
			{
				GetCurrentData();
			}
		}
		,10000);
  } );
  
	function GetCurrentData()
	{
		$.ajax({
		  url: "current_json.php",
		  dataType: "json"
		  }).done(function( jsonData ) {
			$('#ideal_battery_range_km').text(jsonData["ideal_battery_range_km"].toFixed(1));
			$('#odometer').text(jsonData["odometer"].toFixed(1));
			$('#battery_level').text(jsonData["battery_level"]);
			$('#car_version').text(jsonData["car_version"]);
			});
	}
  
  function BackgroudRun($target)
  {
	  $.ajax($target, {
		data: {
			id: ''
		}
		})
		.then(
		function success(name) {
			alert('Reboot!');
		},
		function fail(data, status) {
			alert('Reboot!');
		}
	);
  }
  </script>
  </head>
  <body>
  <button onclick="window.location.href='logfile.php';">Logfile</button>
  <button onclick="BackgroudRun('restartlogger.php');">Restart</button>
  <button onclick="BackgroudRun('update.php');">Update</button>
  <button onclick="window.location.href='backup.php';">Backup</button>
  <button onclick="window.location.href='geofencing.php';">Geofence</button>
  <button onclick="window.location.href='/wakeup.php';">Wakeup</button>
  

  <div id="content">
  <h1>Fahrzeuginfo:</h1>
  <table>
  <tr><td>Typical Range:</td><td><span id="ideal_battery_range_km">---</span> km</td></tr>
  <tr><td>KM Stand:</td><td><span id="odometer">---</span> km</td></tr>
  <tr><td>SOC:</td><td><span id="battery_level">---</span> %</td></tr>
  <tr><td>Car Version:</td><td><span id="car_version">---</span></td></tr>
  </table>
  <?PHP
  echo(file_get_contents("http://teslalogger.de/teslalogger_content_index.php"));
  ?>
  </div>
  <br><br>	
  </body>
</html>