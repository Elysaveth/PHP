<?PHP

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK" && $_POST['newpasswd'])
{
	if ($_POST['passwd'] !== $_POST['passwd2'])
	{
			echo "The passwords does not match\n";
			echo "<br /><br /><a href='http://localhost:8100/d04/ex04/create.html'>Back</a>";
			exit;
	}
	$acc = array();
	if (!file_exists('../private') || !file_exists('../private/passwd'))
	{
		echo "You are not registered\n";
			echo "<br /><br /><a href='http://localhost:8100/d04/ex04/create.html'>Create account</a>";
		exit;
	}
	$acc = unserialize(file_get_contents('../private/passwd'));
	for ($i = 0; $i < count($acc); $i++)
	{
		if ($acc[$i]['login'] === $_POST['login'])
		{
			if (hash('whirlpool', $_POST['passwd']) !== $acc[$i]['passwd'])
			{
				echo "Incorrect User or Password\n";
				echo "<br /><br /><a href='http://localhost:8100/d04/ex04/modif.html'>Back</a>";
				echo "<br /><a href='http://localhost:8100/d04/ex04/create.html'>Create account</a>";
				exit;
			}
			$acc[$i]['passwd'] = hash('whirlpool', $_POST['newpasswd']);
		}
	}
	file_put_contents('../private/passwd', serialize($acc));
	echo "OK\n";
	header('Location: http://localhost:8100/d04/ex04/index.html');
}
else
{
	echo "Please, fill the form\n";
	echo "<br /><br /><a href='http://localhost:8100/d04/ex04/modif.html'>Back</a>";
}
?>
