<?php
$name = $_POST['name'];
$userid = $_POST['userid'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$mysqli = new mysqli('localhost', 'test', 'testuser', 'stscompe');
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf8");
}

// ここにDB処理いろいろ書く（後述）
$sql = "SELECT userid FROM users where userid=$userid";
if ($result = $mysqli->query($sql)) {
    // 連想配列を取得
    while ($row = $result->fetch_assoc()) {
        if(row['userid']===$userid){
        	$msg = '登録済みです。';
        	$link = '<a href="signup.php">戻る</a>';
        }else{
        	$sql = "INSERT INTO users(name, userid, pass) VALUES (:name, :userid, :pass)";
        	if($result = $mysqli->query($sql)){
        		$msg = '会員登録が完了しました';
    			$link = '<a href="login.php">ログインページ</a>';
        	}
        }
    }
    // 結果セットを閉じる
    $result->close();
}
// DB接続を閉じる
$mysqli->close();
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>