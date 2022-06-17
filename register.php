<?php
//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$id = $_POST['user_id'];
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
$sql = "SELECT * FROM users WHERE user_id = :user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $id);
$stmt->execute();
$member = $stmt->fetch();
if ($member['user_id'] === $id) {
    $msg = '同じIDが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    //登録されていなければinsert 
    $sql = "INSERT INTO users(name, user_id, pass) VALUES (:name, :use_id, :pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':mail', $mail);
    $stmt->bindValue(':pass', $pass);
    $stmt->execute();
    $msg = '会員登録が完了しました';
    $link = '<a href="login.php">ログインページ</a>';
}
?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>