<?php
$online = '22.01.2014 14:40 +04';
$online = strtotime($online);
header('Content-Type: text/html; charset=utf-8');
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: '.gmdate(DATE_RFC822, $online));
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>example.com: site on maintenance</title>
</head>
<body>
	<div style="text-align: center; width: 300px; height: 200px; position: absolute; top: 50%; left: 50%; margin-top: -100px; margin-left: -150px;">
		<h2>Site on maintenance. It will be available at <?php echo date('H:i d.m.Y', $online); ?>.</h2>
	</div>
</body>
</html>
