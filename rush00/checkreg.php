<?PHP
session_start();
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK" && $_POST['passwd2'])
{

	if ($_POST['passwd'] !== $_POST['passwd2'])
		{
			header('Location: create.php?error=passwd');
			exit;
		}
	$acc = array();
	if (!file_exists('private'))
		mkdir("private");
	if (!file_exists('private/passwd'))
		file_put_contents('private/passwd', null);
	$acc = unserialize(file_get_contents('private/passwd'));
	foreach ($acc as $key => $value)
	{
		if ($value['login'] === $_POST['login'])
		{
			header('Location: create.php?error=exist');
			exit;
		}
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$secretKey = '6LeQLZsUAAAAAJrre_Bg_xef-5mrXupRhqr4krWd';
		$captcha = $_POST['g-recaptcha-response'];
		if(!$captcha)
		{
			header('Location: create.php?error=captcha');
			exit;
		}
	}
	$ip = $_SERVER['REMOTE_ADDR'];
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);
	if (intval($responseKeys['success'] != 1))
		header('Login: create.php?error=captcha');
	$tmp['login'] = $_POST['login'];
	$tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
	$acc[] = $tmp;
	file_put_contents('private/passwd', serialize($acc));
	$_SESSION['logged_on_user'] = $_POST['login'];
	header('Location: index.php');
}
else
	header('Location: create.php?error=fill');
?>
