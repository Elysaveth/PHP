<?PHP

session_start();
if (!($_SESSION['loggued_on_user']))
{
	echo "ERROR\n";
	exit;
}
if ($_POST['msg'])
{
	$tmp = array();
	if (!(file_exists('../private/chat')))
		file_put_contents('../private/chat', null);
	$chat = unserialize(file_get_contents('../private/chat'));
	$fd = fopen('../private/chat', 'w');
	flock($fd, LOCK_EX);
	$tmp['login'] = $_SESSION['loggued_on_user'];
	$tmp['time'] = time();
	$tmp['msg'] = $_POST['msg'];
	$chat[] = $tmp;
	file_put_contents('../private/chat', serialize($chat));
	flock($fd, LOCK_UN);
	fclose($fd);
}
echo "<html>
<head>
<script language='javascript'>top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
	<form action='speak.php' method='POST'>
		<input style='width:95%;' type='text' name='msg' value=''/><input style='width:5%;' type='submit' name='submit' value='Send'/>
	</form>
</body>
</html>";
?>


