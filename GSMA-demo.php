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
$marker->addLocation(new LatLng(50.058516,19.910553));
$api->addMarker($marker);
$api->setZoom(12);
?>
<br/>with marker:<br/>
<img src="<?php echo $api->getUrlPart();?>"/>
<?php
$api=new GoogleStaticMapApi();
$marker=new Marker();
$marker->setColor('yellow');
$marker->setSize(Marker::SIZE_MID);
$marker->setLabel("West from center");//TODO not working
$marker->addLocation(new LatLng(50.058516,19.910553));
$marker->addLocation(new LatLng(50.049189,19.904416));
$api->addMarker($marker);
$marker=new Marker();
$marker->setColor('blue');
$marker->addLocation(new LatLng(50.06477,20.052474));//Benedict monastery
$marker->addLocation(new LatLng(50.065941,20.045886));//old hospital
$api->addMarker($marker);
$api->setZoom(10);
?>
<br/>styled markers:<br/>
<img src="<?php echo $api->getUrlPart();?>"/>
	</body>
	</html>

