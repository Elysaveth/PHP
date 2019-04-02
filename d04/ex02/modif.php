<?PHP

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK" && $_POST['newpasswd'])
{
	$acc = array();
	if (!file_exists('../private') || !file_exists('../private/passwd'))
	{
		echo "ERROR\n";
		exit;
	}
	$acc = unserialize(file_get_contents('../private/passwd'));
	for ($i = 0; $i < count($acc); $i++)
	{
		if ($acc[$i]['login'] === $_POST['login'])
		{
			if (hash('whirlpool', $_POST['passwd']) !== $acc[$i]['passwd'])
			{
				echo "ERROR\n";
				exit;
			}
			$acc[$i]['passwd'] = hash('whirlpool', $_POST['newpasswd']);
		}
	}
	file_put_contents('../private/passwd', serialize($acc));
	echo "OK\n";
}
else
	echo "ERROR\n";

?>
