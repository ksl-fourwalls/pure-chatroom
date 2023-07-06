<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
	exit;
}

include_once('database.php');
$mydb = new dbcon();

if(isset($_POST['submit'])) {
	$sql = sprintf("insert into chats values ('%s', '%s')", $_SERVER['PHP_AUTH_USER'], $_POST['message']);
	$mydb->query($sql);
}
?>
<!doctype html>
<html>
	<head>
		<title>Chat Bot</title>
		<link rel="stylesheet" href="static/stylesheet.css" />
	</head>
	<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<iframe src="/chat.php" class="mychats"></iframe>
		<div class="textboxcon">
			<input type="text" class="stylesinput" placeholder="Type your message" name="message">
			<button type="submit" value="submit" name="submit"></button>
		</div>
	</form>
	</body>
</html>

