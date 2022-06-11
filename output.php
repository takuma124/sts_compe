<html>
<head>
	<title>output.php</title>
</head>
<body>
<?php
	$name = $_POST['name'];
	$code = $_POST['code'];
	print("次のデータを受け取りました<br/>");
	print("名前:$name<br/>");
	print("filename:$code<br/>");
?>
</body>
</html>