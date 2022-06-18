<?php
//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$userid = $_POST['userid'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$dsn = "mysql:host=localhost;dbname=stscompe;";
$username = 'test';
$password = 'testuser';
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM users WHERE userid = :userid";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':userid', $userid);
$stmt->execute();
$member = $stmt->fetch();
if ($member['userid'] === $userid) {
    $msg = '同じIDが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    $sql = "INSERT INTO users(name, userid, pass) VALUES (:name, :userid, :pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':userid', $userid);
    $stmt->bindValue(':pass', $pass);
    $stmt->execute();
    $msg = '会員登録が完了しました';
    $link = '<a href="login.php">ログインページ</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>