<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
	exit;
}

include_once('database.php');
$mydb = new dbcon();

if(isset($_POST['submit'])) {
	if ($_POST['message'] !== "") {
		$sql = sprintf("insert into chats values ('%s', '%s')", $_SERVER['PHP_AUTH_USER'], $_POST['message']);
		$mydb->query($sql);
	}
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
<!-- Sidebar -->
<div class="w3-sidebar">
  <div class="menu">
    <h2 class="">Chats</h2>
    <a href="#" >loluser</a>
    <a href="#" style="background-color: #ccc">admin</a>
  </div>
  <div class="add_new_contact">
    <input type="text">
    <input type="submit" value="add new" class="add_new_contact">
  </div>
</div>
</form>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<?php
		 echo '<iframe src=/chat.php?to='.$_REQUEST['to'].' class="mychats"></iframe>';
		?>
		<div class="textboxcon">
			<input type="text" class="stylesinput" placeholder="Type your message" name="message">
			<button type="submit" value="submit" name="submit"></button>
		</div>
	</form>
	</body>
</html>

