<?PHP
session_start();
if($_GET['login'] && $_GET['passwd'] && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}

?>


<html><body>
<form ...>
Username: <input name="login" type="text" value="<?PHP echo $_SESSION['login']; ?>" />
	<br />
	Password: <input name=passwd type="text" value="<?PHP echo $_SESSION['passwd']; ?>"/>
	<input name="submit" type="submit" value="OK" />
</form>
</body></html>
