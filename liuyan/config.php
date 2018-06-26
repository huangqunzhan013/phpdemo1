<?php
	//数据库配置信息(用户名,密码，数据库名)
	$db_host = "localhost";
	$db_user = "root";
	$db_pwd = "";
	$db_name = "ajaxdemo";
	$mysqli = new mysqli($db_host,$db_user,$db_pwd,$db_name);
	if($mysqli->connect_errno != 0) {
		echo "数据库连接错误，错误信息：".$mysqli->connect_errno();
		exit;
	}
	$mysqli->query("set names utf8");
?>