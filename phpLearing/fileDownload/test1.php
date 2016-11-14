<?php
	// 字符串内容下载
	header("text/html;charset=gbk");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=a.html");
	echo '<!DOCTYPE html>
<html>
<head>
	<title>中文</title>
	<meta charset="gbk">
	<meta name="applicable-device" content="mobile">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0,maximum-scale=1"/>
	<meta name="robots" content="all" />
	<meta name="author" content="Tencent-TGideas" />
	<meta name="Keywords" content="" />
	<meta name="Description" content="" />
</head>
<body>中阿斯顿阿萨德阿萨德按时</body></html>';
?>