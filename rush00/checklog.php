<?PHP

require_once('auth.php');
session_start();
if ($_POST['login'] && auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['logged_on_user'] = $_POST['login'];
	header ('Location: index.php');
}
else
{
	$_SESSION['logged_on_user'] = "";
	header('Location: login.php?session=error');
}

?>
