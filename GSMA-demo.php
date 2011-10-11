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
<img src="<?php echo $api->getUrlPart();?>"/>
	</body>
	</html>

