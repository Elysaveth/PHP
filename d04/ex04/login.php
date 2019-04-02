<?PHP

require_once('auth.php');
session_start();
if ($_POST['login'] && auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	echo "<h1>Welcome Back! ".$_POST['login']."</h1>";
	echo "	<!DOCTYPE html>
			<html>
			<head>
			<meta charset='UTF-8'>
			<title>42Chat</title>
			</head>
			<body>
			<iframe name='chat' src='chat.php' height='550px' width='100%';></iframe><br />
			<iframe name='speak' src='speak.php' height='50px' width='100%';></iframe>
			</body>
			</html>";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "Incorrect User or Password\n";
	echo "<br /><br /><a href='http://localhost:8100/d04/ex04/index.html'>Back</a>";
	echo "<br />Your are not registered? <a href='http://localhost:8100/d04/ex04/create.html'>Create account</a>";
}

?>
