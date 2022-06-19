<?php
$num = 0;
if (is_dir("./program")) {
    if $dh = opendir("./program") {
        while (($file = readdir($dh)) !== false) {
            $num++;
        }
        closedir($dh);
    }
}
$userid = $_SESSION['userid'];
$tempfile = $_FILES['code']['tmp_name'];
$filename = $_FILES['code']['name'];
$filepath = "./program/${num}.py";
$file_name = $_FILES[''];
$method = $_POST['method'];
$timestamp = date("Y-m-d H:i:s", time());
$msg = 'default';
$link = '<a href="index.php">ホーム</a>';

#fnameはinputタグにつけられた名前に変更する - > codeに変更済み
if (is_uploaded_file($tempfile)) {
    if (move_uploaded_file($tempfile, $filepath)) {
        $msg = "${filename}を提出しました！";
        $command = "python3 ${file_path}";
        exec($command);
        $command = "python3 pearson.py ${userid} ${method} ${timestamp}";
        exec($command);
    } else {
        $msg = "${filename}を提出できませんでした...";
    }
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
