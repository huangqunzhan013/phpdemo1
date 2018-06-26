<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AJAX无刷新留言系统</title>
<style type="text/css">
body{color:#555;font-size:14px;padding:0;margin:0;}
#form { background:#dedede; padding:10px 20px; width:700px; margin: 10px auto; border:1px solid #333;}
#show{ background:#f6f6f6;padding:10px 20px; width:700px; margin: 10px auto; border:1px solid #333;}
#show p{ margin:6px; font-size:13px; line-height:22px; border-bottom:1px dashed #cdcdcd;}
#form input,textarea{width: 100%;}
lable {margin: 10px}
</style>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#sub").click(function(){
		//只是说明原理,然后这里省去了验证文本框内容的步骤，直接发送ajax请求
		$.post("add.php",{name : $("#name").val(), content : $("#content").val()}, function(data){
				if(data.status){
					var str = "<p><strong>"+data.name+"</strong> 发表了："+data.content+"</p>";
					$("#show").prepend(str);  //在前面追加
				}else{
					alert("评论失败");
				}
			}, 'json');	
	});				 
});
</script>
</head>
<body>
<div id="form">
	<table width="100%" cellpadding="10">
		<tr>
			<td width="60"><lable>用户名:</lable></td>
			<td><input type="text" name="name" id="name" /></td>
		</tr>
		<tr>
			<td width="60"><lable>内&nbsp;容:</lable></td>
			<td><lable></lable><textarea name="content" id="content"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><center><button id="sub">发布</button></center></td>
		</tr>
	</table>
</div>
	<div id="show">
		<?php
		include 'config.php';
			$sql = 'select * from test;';
			$res = $mysqli->query($sql);
			while ($row = $res->fetch_array()) {
				echo "<p><strong>".$row['name']."</strong>发表了：".$row['content']."</p>";
			}
		?>
	</div>
</body> 
</html>