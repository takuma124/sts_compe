<?php
$dsn = 'mysql:host=localhost;dbname=stscompe;';
$username = 'test';
$password = 'testuser';
try {
    $dbh = new PDO($dsn, $username, $password);
    print('ok');
} catch (PDOException $e) {
    print('error');
    $msg = $e->getMessage();
    print($msg);
}
?>