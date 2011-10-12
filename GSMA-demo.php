<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GSMA demo </title>
</head>
<body>
<?php
require_once 'GoogleStaticMapApi.php';
$api=new GoogleStaticMapApi();
?>
minimal:<br/>
<img src="<?php echo $api->getUrlPart();?>"/>
<?php
$api=new GoogleStaticMapApi();
$marker=new Marker();
$marker->addLocation(new LatLng(50.064192,19.919992));
$api->addMarker($marker);
?>
with marker:<br/>
<img src="<?php echo $api->getUrlPart();?>"/>
	</body>
	</html>

