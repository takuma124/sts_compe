<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>提出フォーム</title>
</head>
<body>
入力フォームです,
モデルを提出してみましょう。
<form action="submitted.php" method="post" enctype="multipart/form-data">
	<input type="file" name="code" accept=".py"/><br>
	<input type="text" name="method" required/><br>
	<input type="submit" value="アップロード"/><br>
</form>
<a href="index.php">ホーム</a>
</body>
</html>