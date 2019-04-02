<?PHP

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
{
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
			echo "ERROR\n";
			exit;
		}
	}
	$tmp['login'] = $_POST['login'];
	$tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
	$acc[] = $tmp;
	file_put_contents('../private/passwd', serialize($acc));
	echo "OK\n";
}
else
	echo "ERROR\n";

?>
