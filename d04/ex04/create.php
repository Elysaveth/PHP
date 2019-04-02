<?PHP

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK" && $_POST['passwd2'])
{
	if ($_POST['passwd'] !== $_POST['passwd2'])
		{
			echo "The passwords does not match\n";
			echo "<br /><br /><a href='http://localhost:8100/d04/ex04/create.html'>Back</a>";
			exit;
		}
	$acc = array();
	if (!file_exists('../private'))
		mkdir("../private");
	if (!file_exists('../private/passwd'))
		file_put_contents('../private/passwd', null);
	$acc = unserialize(file_get_contents('../private/passwd'));
	foreach ($acc as $key => $value)
	{
		if ($value['login'] === $_POST['login'])
		{
			echo "Your are already registered\n";
			echo "<br /><br /><a href='http://localhost:8100/d04/ex04/modif.html'>Change your password</a>";
			echo "<br /><a href='http://localhost:8100/d04/ex04/index.html'>Login</a>";
			echo "<br /><a href='http://localhost:8100/d04/ex04/create.html'>Create account</a>";
			exit;
		}
	}
	$tmp['login'] = $_POST['login'];
	$tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
	$acc[] = $tmp;
	file_put_contents('../private/passwd', serialize($acc));
	echo "OK\n";
	header('Location: http://localhost:8100/d04/ex04/index.html');
}
else
{
	echo "Please, fill the form\n";
			echo "<br /><br /><a href='http://localhost:8100/d04/ex04/create.html'>Back</a>";
}
?>
