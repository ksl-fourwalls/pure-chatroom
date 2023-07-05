<?php
$conn = mysqli_connect('localhost', 'user', 'password', 'chatroom');
// Check Connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
if(isset($_POST['submit'])) {
	$sql = sprintf("insert into chats values ('%s', '%s')", "kushal", $_POST['message']);
	$result = mysqli_query($conn, $sql);
}
?>

<!doctype html>
<html>
	<head>
		<title>Chat Bot</title>
		<meta http-equiv="refresh" content="100" />
		<style>
html, body {
	min-height: 100% !important;
	height: 100%;
	margin: 0;

}

.messages {
	width: 100%;
	height: calc(100vh - 90px);
	position: absolute;
	scroll-behavior: smooth;
	overflow-y: scroll;
	transform: rotateX(180deg);
}



.me, .container {
	padding: 20px 15px;
	margin-bottom: 30px;
	width: 200px;
}

.me {
	clip-path: polygon(0% 0%, 90% 0%, 90% 90%, 100% 100%, 80% 90%, 0% 90%);
	background: brown;
	margin-left: 70%;
}

.container {
	/* x y */
	clip-path: polygon(10% 0%, 100% 0%, 100% 90%, 20% 90%, 5% 100%, 10% 90%);
	background: lightgreen;
	padding-left: 40px;
	margin-left: 5%;
}

.stylesinput {
	width: 80%;
	height: 3em;
	background-color: white;
	border-radius: 10px;
	font-size: 1.2em;
	padding-left: 1em;
	padding-right: 1em;
}

.textboxcon {
	background-color: grey;
	position: absolute;
	display: flex;
	justify-content: center;
	align-items: center;

	height: 90px;
	width: 100%;

	top: calc(100vh - 90px);
}

.textboxcon button {
	background: no-repeat center/80% url(images/send-1024.png);
	background-color: lightgrey;
	height: 5em;
	width: 6em;
	margin-left: 1em;
	border-radius: 10px;
}
		</style>
	</head>
	<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="messages">
		<!-- hack: to start scroll from end -->
		<div style="transform: rotateX(180deg)">
<?php
	$sql = "select user, chat from chats";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		foreach ($rows as $row) {
			echo '<div class="container">' . $row["chat"] . '</div>';
		}
	}
?>
			<div class="me">
				Hello
			</div>
		</div>
		</div>
		<div class="textboxcon">
			<input type="text" class="stylesinput" placeholder="Type your message" name="message">
			<button type="submit" value="submit" name="submit"></button>
		</div>
	</form>
	</body>
</html>

<?php
	mysqli_close($conn);
?>
