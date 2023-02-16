<?php
  require_once('./services/ip-api.php');
  require_once('./services/weather-api.php');
  $archivo = __DIR__.'/config.ini';
  $content = parse_ini_file($archivo, true);
  
      
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css"></link>
<title>Weather data</title>
</head>

<body>
<div class='header' ><h1>CONSULTA A API DEL CLIMA</h1></div>
<div class="container">
  <h3> IP: <?= getIp(); ?> </h3>
  <h3> TEMP: <?= getTemp($content['WEATHER_API']['API_KEY'], $content['WEATHER_API']['API_URL'], getIp()); ?> Celsius </h3>
</div>

</body>
</html>