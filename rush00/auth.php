<?PHP

function auth($login, $passwd)
{
	if ($login && $passwd)
	{
		$acc = array();
		if (!file_exists('private') || !file_exists('private/passwd'))
			return (FALSE);
		$acc = unserialize(file_get_contents('private/passwd'));
		for ($i = 0; $i < count($acc); $i++)
			if ($acc[$i]['login'] === $login)
				if (hash('whirlpool', $passwd) === $acc[$i]['passwd'])
					return (TRUE);
	}
	else
		return (FALSE);
}

?>
