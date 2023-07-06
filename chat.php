<?php
include_once('database.php');
$mydb = new dbcon();
?>
<!doctype html>
<html>
	<head>
		<title>Chat Bot</title>
		<meta http-equiv="refresh" content="10" />
		<link rel="stylesheet" href="static/stylesheet.css" />
	</head>
	<body>
		<div class="messages">
		<!-- hack: to start scroll from end -->
		<div style="transform: rotateX(180deg)">
<?php
	$sql = "select user, chat from chats";
	$results = $mydb->query($sql);

	while ($row = $results->fetchArray()) {
		if ($_SERVER['PHP_AUTH_USER'] == $row['user']) {
			echo '<div class="me">'. $row["chat"] .'</div>';
		}
		else {
			echo '<div class="container">' . $row["chat"] . '</div>';
		}
	}
	echo '<br>';
?>
		</div>
		</div>
</body>
</html>
