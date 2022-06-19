<!-- 
<?php
$year = 2022;
?>
-->

<html>
<head>
	<title>2022年度</title>
</head>

<body>
	<center>
	<table border="1" width="500" height="200" style="border-collapse: collapse;">
		<tr>
			<th>順位</th>
			<th>スコア</th>
			<th>ユーザ名</th>
		</tr>
		<?php
		$dsn = "mysql:host=localhost;dbname=stscompe;";
		$username = 'test';
		$password = 'testuser';
		try {
		    $dbh = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
		    $msg = $e->getMessage();
		}

		$sql = "SELECT userid FROM users";
		$stmt = $dbh->prepare($sql);
		// $stmt->bindValue(':userid', $userid);
		$stmt->execute();
		$member = $stmt->fetch();
		// $num = count($member['userid']);
		$scores = array();

		foreach($member['userid'] as $userid){
			$sql = "SELECT * FROM score WHERE userid = $userid ORDER BY pearson DESC LIMIT 1";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch();
			if($result === false){
				continue;
			}else{
				$scores[result['userid']] = $result['pearson'];
			}
		}
		arsort($scores);
		$i = 1;
		foreach($scores as $key => $value) {
		    print '<tr>'; 
		    print '<th>'.$i.'</th>';
		    print '<th>'.$value.'</th>';
		    print '<th>'.$key.'</th>';
		    print'</tr>';
		    $i++;
		}
		?>
	</table>
	</center>
</body>
<html>
