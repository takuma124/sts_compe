<?php
session_start();
$username = $_SESSION['name'];
$board = '';
$up = '';
if (isset($_SESSION['userid'])) {//ログインしているとき
    $msg = 'こんにちは' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a href="logout.php">ログアウト</a>';
    $board = '<a href="board.php">リーダボード</a>';
    $up = '<a href="up.php">提出はこちら</a>';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a href="login.php">ログイン</a>';
}
?>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>

<?php echo $board; ?>
<?php echo $up; ?>