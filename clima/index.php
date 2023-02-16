<?php
  require_once('./services/ip-api.php');
  require_once('./services/weather-api.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Weather data</title>
</head>

<body>
<h1>
  <a href="index.php" style="color:#fff;text-decoration:none">php<span class="color">Scaffold</span></a>
</h1>

<div class="container">
  <h1> IP: <?= getIp(); ?> </h1>
  <h1> TEMP: <?= getTemp(WEATHERAPI.API_KEY, WEATHERAPI.API_URL, getIp()); ?> </h1>
</div>

</body>
</html>