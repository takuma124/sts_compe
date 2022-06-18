<html>
<head>
	<title>output.php</title>
</head>
<body>
<?php
	// $code = $_POST['code'];
	$tempfile = $_FILES['code']['tmp_name'];
	$filename = $_FILES['code']['name'];
	print("次のデータを受け取りました<br>");
	// print("名前:$code<br>");
	print("filename:$filename<br>");
	// $command = "/Users/suzukitakuma/.pyenv/shims/python ./$filename";
	// exec($command, $output, $state);
	// foreach ($output as $out) {
		// print_r($out . '<br>');
	// }
	// print("state: $state<br>");

	$path = './program/';
	// print(is_uploaded_file($_FILES['code']['tmp_name']));
	if(is_uploaded_file($tempfile)){
		if(move_uploaded_file($tempfile, $path.$filename)){
			echo "$filename をアップロードしました。";
		}else{
			echo "ファイルをアップロードできませんでした。";
		}
	}else{
		echo "ファイルが選択されていません。";
	}
?>
</body>
</html>