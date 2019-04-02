<?PHP

session_start();
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
{
	$acc = array();
	if (!file_exists('private') || !file_exists('private/passwd'))
	{
		header('Location: delete.php?session=error');
		exit;
	}
	$acc = unserialize(file_get_contents('private/passwd'));
	for ($i = 0; $i < count($acc); $i++)
	{
		if ($acc[$i]['login'] === $_POST['login'])
		{
			if (hash('whirlpool', $_POST['passwd']) !== $acc[$i]['passwd'])
			{
				header('Location: delete.php?session=error');
				exit;
			}
			session_destroy();
			unset ($acc[$i]);
			break ;
		}
	}
	file_put_contents('private/passwd', serialize($acc));
	header('Location: index.php');
}
else
	header('Location: delete.php?session=error');
?>
