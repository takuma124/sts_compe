<?php
//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$id = $_POST['userid'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$dsn = "mysql:host=localhost;dbname=stscompe;";
$username = 'test';
$password = 'testuser';
try {
    $dbh = new PDO($dsn, $username, $password);
    print('ok');
} catch (PDOException $e) {
    print('error');
    $msg = $e->getMessage();
}

//フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM users WHERE userid = :userid";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':userid', $id);
$stmt->execute();
$member = $stmt->fetch();
if ($member['userid'] === $id) {
    $msg = '同じIDが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    //登録されていなければinsert 
    $sql = "INSERT INTO users(name, userid, pass) VALUES (:name, :useid, :pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':userid', $id);
    $stmt->bindValue(':pass', $pass);
    $stmt->execute();
    $msg = '会員登録が完了しました';
    $link = '<a href="login.php">ログインページ</a>';
}
?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>